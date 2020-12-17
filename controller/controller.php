<?php
	
	require('../model/model.php');

	function home()
	{
		$files = array_diff(scandir('db/games'), array('..', '.'));

		require('../view/home.php');
	}

	function game()
	{
		$id = htmlspecialchars($_GET['id']);

		$game = open('db/games/'.$id.'.json');

		require('../view/game.php');
	}

	function add()
	{
		require('../view/add.php');
	}

	function form()
	{
		require('../view/form.php');
	}

	function traitement_nG()
	{
		$titre = htmlspecialchars($_GET['titre']);
		$description = htmlspecialchars($_GET['description']);
		$licence = htmlspecialchars($_GET['licence']);
		if($licence=="Sous licence"){
			$licence_name = htmlspecialchars($_GET['licence-name']);
			$licence_end = htmlspecialchars($_GET['licence-end']);
		}
		$émul_test = htmlspecialchars($_GET['émul-test']);
		$swf_link = htmlspecialchars($_GET['swf_link']);
		$capture_link = htmlspecialchars($_GET['capture_link']);
		$download_link = htmlspecialchars($_GET['download_link']);
		if($licence=="Domaine public"){
			$isRoyaltyFree = true;
		}
		else{
			$isRoyaltyFree = false;
		}
		if($émul_test=="Compatible avec Ruffle"){
			$withRuffle = true;
		}
		else{
			$withRuffle = false;
		}

		$files = array_diff(scandir('db/games'), array('..', '.'));
		$id = sizeof($files)+1;

		$json = fopen('db/games/'.$id.'.json', 'a+');

		$new_game = array();
		$new_game['id'] = $id;
		$new_game['name'] = $titre;
		$new_game['description'] = $description;
		$new_game['isRoyaltyFree'] = $isRoyaltyFree;
		if(!$isRoyaltyFree){
			$new_game['licence-status'] = $licence;
			if($licence=='Sous licence'){
				$new_game['licence-name'] = $licence_name;
				$new_game['licence-end'] = $licence_end;
			}
		}
		$new_game['withRuffle'] = $withRuffle;
		$new_game['capture_link'] = $capture_link;
		$new_game['download_link'] = $download_link;
		$new_game['play_link'] = $swf_link;

		$new_game = json_encode($new_game);

		fputs($json,$new_game);

		fclose($json);

		header('Location: index.php?action=home');

	}
?>