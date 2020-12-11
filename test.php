<?php
	$monfichier = fopen('public/db/data.json', 'r+');

	$temp = fgets($monfichier);

	fseek($monfichier, 0);

	$data = json_decode($temp,JSON_OBJECT_AS_ARRAY);

	// $new_game = array();
	// $new_game['name'] = 'Penguin Stack';
	// $new_game['description'] = 'Jeu de pile';
	// $new_game['isRoyaltyFree'] = true;
	// $new_game['capture_link'] = "../Game_Captures/penguinstack.png";
	// $new_game['download_link'] = "../SWF/Penguin Stack.swf";

	// array_push($data['games'], $new_game);

	foreach ($data['games'] as $id => $game) {
		$data['games'][$id]['download_link'] = "https://archive.org/download/swf-games_202012";
	}

	$data = json_encode($data);

	fputs($monfichier,$data);


	fclose($monfichier);
?>