<?php
	function home()
	{
		$json = fopen('db/data.json', 'r+');
		$temp = fgets($json);

		fseek($json, 0);

		$data = json_decode($temp,JSON_OBJECT_AS_ARRAY);

		require('../view/home.php');
	}

	function game()
	{
		$id = htmlspecialchars($_GET['id']);

		$json = fopen('db/data.json', 'r+');
		$temp = fgets($json);

		fseek($json, 0);

		$data = json_decode($temp,JSON_OBJECT_AS_ARRAY);
		$game = $data['games'][$id];

		require('../view/game.php');
	}

	function login()
	{
		require('../view/login.php');
	}

	function register()
	{
		require('../view/register.php');
	}
?>