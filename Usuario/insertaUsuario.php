<?php

	// Upload Image
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])){ 
		$file_realname = $_FILES['userfile']['name']; 
		copy($_FILES['userfile']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Integrantes/".trim($file_realname)); 
	}else{ 
		echo "<b><font color=red>No file uploaded.</font></b><BR>No file available or file too big to upload.";
		?><script language="JavaScript"> 
			alert ("No se ha podido cargar la imagen."); 
        </script>;<?php
		echo '<script language="javascript" type="text/javascript">window.location="../Registrarse.php"</script>';		
	}
	///////////////
	
	$dni=addslashes(trim($_POST['dni']));
	$nombre=addslashes(trim($_POST['userName']));
	$apellido=addslashes(trim($_POST['userSurname']));
	$password=addslashes(trim($_POST['password']));		
	$fechaNacimiento = addslashes( substr(trim($_POST['datepicker']),6,4) .'-'.substr(trim($_POST['datepicker']),3,2) .'-'. substr(trim($_POST['datepicker']),0,2) );
	$address=addslashes(trim($_POST['address']));	
	$telefono=addslashes(trim($_POST['phone']));
	$email=addslashes(trim($_POST['mail']));
	$sportSelected=addslashes(trim($_POST['sport']));
	$image=trim($file_realname);
	
	if ($sportSelected == 1){
		$deporte = "Futbol";
		$idSport="01";
	}else if ($sportSelected == 2){
		$deporte = "Futbol Sala";
		$idSport="02";
	}else if ($sportSelected == 3){
		$deporte = "Baloncesto";
		$idSport="03";
	}
			
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();
	
	$query='SELECT * FROM usergroup WHERE dni="'.$dni.'"';
	$resultados=mysql_query($query);
    $num_resultados=mysql_num_rows($resultados);
					
	$query2='INSERT INTO usergroup VALUES (\''.$dni.'\',\''.$nombre.'\',\''.$apellido.'\',\''.$password.'\',\''.$fechaNacimiento.'\',\''.$address.'\',\''.$telefono.'\',\''.$email.'\',\''.$deporte.'\',\''.$image.'\')';
	
	if ($num_resultados > 0){
		existingUser();
		echo '<script language="javascript" type="text/javascript">window.location="/Registrarse.php"</script>';
	}else{
		$query3='INSERT INTO playerSport VALUES (\''.$dni.'\',\''.$idSport.'\')';
		modifyDB($query2);
		modifyDB($query3);		
	}		
	echo '<script language="javascript" type="text/javascript">window.location="/registroRealizado.php"</script>';
?>







