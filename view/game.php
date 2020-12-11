<!doctype html>
<html lang="fr">
<title><?php echo $game['name']; ?></title>
<head>
<?php include_once '../view/template/header.php'; ?>
</head>

<main>
  <div class="album py-5 bg-light">
    <!-- <button type="button" class="btn btn-primary ml-2 mb-2"><</button> -->
    <div class="container">
      <div class="row row-cols-1 g-2">
          <div class="col">
            <div class="card shadow-sm">
              <?php if($game['isRoyaltyFree'] and $game['withRuffle']){ ?>
                <embed type="application/x-shockwave-flash" src="<?php echo 'https://cors-anywhere.herokuapp.com/'.$game['play_link'];?>" width="100%" height="700"/>
              <?php }
              else { ?>
                <img class="bd-placeholder-img" src="<?php echo $game['capture_link'];?>"/>
              <?php } ?>
              <div class="card-body">
                <h5><?php echo $game['name']; ?></h5>
                <p class="card-text"><?php echo $game['description']; ?></p>
                <div id="more" style="display: none">
                  <ul>
                    <?php if ($game['isRoyaltyFree']){ ?>
                      <li>Libre de Droit</li>
                    <?php }
                    else { ?>
                      <li>Sous licence [...] jusqu'au [...]</li>
                    <?php }
                    if ($game['withRuffle']){ ?>
                      <li>
                        Compatible avec :
                        <ul>
                          <li>Ruffle</li>
                        </ul>
                      </li>
                    <?php }
                    else { ?>
                      <li>Aucun émulateur proposé pour l'instant</li>
                    <?php } ?>
                    <li><a href="<?php echo $game['download_link']; ?>">Télécharger le fichier .swf</a></li>
                  </ul>
                </div>
                <p>
                  <button class="btn btn-primary" type="button" onclick="show()" id="show">
                    + Plus d'infos
                  </button>
                </p>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</main>

<?php include_once '../view/template/footer.php'; ?>

</html>

<script>
function show() {;
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("show");

  if (moreText.style.display === "none") {
    btnText.innerHTML = "- Moins d'infos"; 
    moreText.style.display = "inline";
  } else {
    btnText.innerHTML = "+ Plus d'infos"; 
    moreText.style.display = "none";
  }
}
</script>