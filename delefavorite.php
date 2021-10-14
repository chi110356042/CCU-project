<?php

	session_start();

	if($_GET['vid']){
		unset($_SESSION["shoplist"][$_GET['vid']]);
	}
	
	header("Location: mainfavo.php");


?>