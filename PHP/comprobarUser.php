<?php
	session_start();
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();

	$query='SELECT password,userName FROM usergroup WHERE email LIKE "'.trim($_POST['userMail']).'"';
	$resultados=mysql_query($query);
	$row=mysql_fetch_array($resultados);
	
	$userMail=trim($_POST['userMail']);
	$password=trim($_POST['password']);	
	$pass=$row['password'];
	$userName=$row['userName'];		
	
	if ( (trim($_POST['password']) == stripslashes($pass)) &&
		(!empty($userMail)) && (!empty($password)) ){
			// Authentification
			$sessionUser = $userName;
	   		$loggedUser="ok";
	   		session_register("loggedUser");
			session_register("sessionUser");
			// Authentification
			echo '<script language="javascript" type="text/javascript">window.location="/main.php"</script>';
			
	}else
		echo '<script language="javascript" type="text/javascript">window.location="/Usuario/loginErrorUser.php"</script>';
?>