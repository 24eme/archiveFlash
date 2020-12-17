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
	            case 'add':
	                add();
	            break;
	            case 'form':
	                form();
	            break;
	            case 'traitement_nG':
	                traitement_nG();
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