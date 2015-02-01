<?php
	
	// Upload Image
	if (is_uploaded_file($_FILES['userfile']['tmp_name'])){ 
		$file_realname = $_FILES['userfile']['name']; 
		copy($_FILES['userfile']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Trofeos/".trim($file_realname)); 
	}else{ 
		echo "<b><font color=red>No file uploaded.</font></b><BR>No file available or file too big to upload.";
		?><script language="JavaScript"> 
			alert ("No se ha podido cargar la imagen."); 
        </script>;<?php
		echo '<script language="javascript" type="text/javascript">window.location="../Editor/modificarTrofeo.php"</script>';		
	}
	///////////////
	
	$idSport=trim($_POST['sport']);
	$namePrize=trim($_POST['name']);
	$yearPrize=trim($_POST['year']);	
	$pathImage=trim($file_realname);
	
	echo $idSport.'<br>';
	echo $namePrize.'<br>';
	echo $pathImage.'<br>';		
	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
		
	$query='UPDATE prize SET idSport=\''.$idSport.'\',namePrize=\''.$namePrize.'\',year=\''.$yearPrize.'\',image=\''.$pathImage.'\' WHERE idPrize=\''.$_GET['idPrize'].'\'';
	modifyDB($query);
	echo '<script language="javascript" type="text/javascript">window.location="../Editor/trofeos.php"</script>';
?>
