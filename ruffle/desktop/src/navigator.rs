//! Navigator backend for web

use crate::custom_event::RuffleEvent;
use isahc::config::RedirectPolicy;
use isahc::prelude::*;
use ruffle_core::backend::navigator::{
    NavigationMethod, NavigatorBackend, OwnedFuture, RequestOptions,
};
use ruffle_core::indexmap::IndexMap;
use ruffle_core::loader::Error;
use std::borrow::Cow;
use std::fs;
use std::io::Read;
use std::rc::Rc;
use std::sync::mpsc::Sender;
use std::time::{Duration, Instant};
use url::Url;
use winit::event_loop::EventLoopProxy;

/// Implementation of `NavigatorBackend` for non-web environments that can call
/// out to a web browser.
pub struct ExternalNavigatorBackend {
    /// Sink for tasks sent to us through `spawn_future`.
    channel: Sender<OwnedFuture<(), Error>>,

    /// Event sink to trigger a new task poll.
    event_loop: EventLoopProxy<RuffleEvent>,

    /// The url to use for all relative fetches.
    movie_url: Url,

    /// The time that the SWF was launched.
    start_time: Instant,

    // Client to use for network requests
    client: Option<Rc<HttpClient>>,
}

impl ExternalNavigatorBackend {
    #[allow(dead_code)]
    /// Construct a navigator backend with fetch and async capability.
    pub fn new(
        movie_url: Url,
        channel: Sender<OwnedFuture<(), Error>>,
        event_loop: EventLoopProxy<RuffleEvent>,
        proxy: Option<Url>,
    ) -> Self {
        let proxy = proxy.and_then(|url| url.as_str().parse().ok());
        let builder = HttpClient::builder()
            .proxy(proxy)
            .redirect_policy(RedirectPolicy::Follow);

        let client = builder.build().ok().map(Rc::new);

        Self {
            channel,
            event_loop,
            client,
            movie_url,
            start_time: Instant::now(),
        }
    }
}

impl NavigatorBackend for ExternalNavigatorBackend {
    fn navigate_to_url(
        &self,
        url: String,
        _window_spec: Option<String>,
        vars_method: Option<(NavigationMethod, IndexMap<String, String>)>,
    ) {
        //TODO: Should we return a result for failed opens? Does Flash care?

        //NOTE: Flash desktop players / projectors ignore the window parameter,
        //      unless it's a `_layer`, and we shouldn't handle that anyway.
        let mut parsed_url = match Url::parse(&url) {
            Ok(parsed_url) => parsed_url,
            Err(e) => {
                log::error!(
                    "Could not parse URL because of {}, the corrupt URL was: {}",
                    e,
                    url
                );
                return;
            }
        };

        let modified_url = match vars_method {
            Some((_, query_pairs)) => {
                {
                    //lifetime limiter because we don't have NLL yet
                    let mut modifier = parsed_url.query_pairs_mut();

                    for (k, v) in query_pairs.iter() {
                        modifier.append_pair(k, v);
                    }
                }

                parsed_url.into_string()
            }
            None => url,
        };

        match webbrowser::open(&modified_url) {
            Ok(_output) => {}
            Err(e) => log::error!("Could not open URL {}: {}", modified_url, e),
        };
    }

    fn time_since_launch(&mut self) -> Duration {
        Instant::now().duration_since(self.start_time)
    }

    fn fetch(&self, url: &str, options: RequestOptions) -> OwnedFuture<Vec<u8>, Error> {
        // TODO: honor sandbox type (local-with-filesystem, local-with-network, remote, ...)
        let full_url = self.movie_url.clone().join(url).unwrap();

        let client = self.client.clone();
        match full_url.scheme() {
            "file" => Box::pin(async move {
                fs::read(full_url.to_file_path().unwrap()).map_err(Error::NetworkError)
            }),
            _ => Box::pin(async move {
                let client = client.ok_or(Error::NetworkUnavailable)?;

                let request = match options.method() {
                    NavigationMethod::GET => Request::get(full_url.to_string()),
                    NavigationMethod::POST => Request::post(full_url.to_string()),
                };

                let (body_data, _) = options.body().clone().unwrap_or_default();
                let body = request
                    .body(body_data)
                    .map_err(|e| Error::FetchError(e.to_string()))?;

                let response = client
                    .send_async(body)
                    .await
                    .map_err(|e| Error::FetchError(e.to_string()))?;

                response_to_bytes(response).map_err(|e| Error::FetchError(e.to_string()))
            }),
        }
    }

    fn spawn_future(&mut self, future: OwnedFuture<(), Error>) {
        self.channel.send(future).expect("working channel send");

        if self.event_loop.send_event(RuffleEvent::TaskPoll).is_err() {
            log::warn!(
                "A task was queued on an event loop that has already ended. It will not be polled."
            );
        }
    }

    fn resolve_relative_url<'a>(&mut self, url: &'a str) -> Cow<'a, str> {
        let relative = self.movie_url.join(url);
        if let Ok(relative) = relative {
            relative.into_string().into()
        } else {
            url.into()
        }
    }
}

fn response_to_bytes(res: Response<Body>) -> Result<Vec<u8>, std::io::Error> {
    let mut buffer: Vec<u8> = Vec::new();
    res.into_body().read_to_end(&mut buffer)?;
    Ok(buffer)
}