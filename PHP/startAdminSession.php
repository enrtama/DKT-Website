<?php
	session_start();
	if ( ($_SESSION['loggedAdmin'] != "ok") || ($_SESSION['timeout'] + 100 * 60 < time()) ){
	   // Redirect login page
	   header ("Location: /login.php");
	   exit;
	}
?>