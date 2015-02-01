<?php
	session_start();
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();

	$query='SELECT user,password,userType FROM staff WHERE user LIKE "'.trim($_POST['userName']).'"';
	$resultados=mysql_query($query);
	$row=mysql_fetch_array($resultados);
	
	$userName=trim($_POST['userName']);
	$pass=$row['password'];
	$user=$row['user'];
	$userType=$row['userType'];
	
	if (trim($_POST['password'] == stripslashes($pass) &&
		$_POST['userType'] == 1 &&
		(isset($user)) &&
		(stripslashes($userType) == 'Administrator') &&
		(!empty($userName)) ) ){
			// Authentification
			$sessionAdmin = $user;
	   		$loggedAdmin="ok";
	   		session_register("loggedAdmin");
			session_register("sessionAdmin");
			$_SESSION['timeout'] = time();			
			// Authentification
			echo '<script language="javascript" type="text/javascript">window.location="/Admin/adminArea.php"</script>';
			
	}else if (trim($_POST['password'] == stripslashes($pass) && 
		($_POST['userType'] == 2) &&
		(isset($user)) &&
		(stripslashes($userType) == 'Editor') ) ){
			// Authentification
			session_start();
			$sessionAdmin = $user;
	   		$loggedAdmin="ok";
	   		session_register("loggedAdmin");
			session_register("sessionAdmin");
			$_SESSION['timeout'] = time();			
			// Authentification
			echo '<script language="javascript" type="text/javascript">window.location="/Editor/editorArea.php"</script>';
	}else
		echo '<script language="javascript" type="text/javascript">window.location="/loginError.php"</script>';
?>