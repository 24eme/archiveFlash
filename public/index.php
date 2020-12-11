<?php
	require('../controller/controller.php');

	try{
	    if(isset($_GET['action']))
	    {
	    	switch($_GET['action'])
	    	{
	            case 'home':
	                home();
	            break;
	            case 'game':
	                game();
	            break;
	            case 'login':
	                login();
	            break;
	            case 'register':
	                register();
	            break;
	    	}
	    }
	    else
	    {
	    	home();
	    }
	}
	catch(Exception $e){
	    echo 'Erreur' . $e->getMessage();
	}
?>