<?php
	// Upload Image
	if ( (is_uploaded_file($_FILES['path1']['tmp_name'])) && 
	   (is_uploaded_file($_FILES['path2']['tmp_name'])) &&
	   (is_uploaded_file($_FILES['path3']['tmp_name'])) &&
	   (is_uploaded_file($_FILES['path4']['tmp_name'])) &&
	   (is_uploaded_file($_FILES['path5']['tmp_name'])) ){ 
		$file1 = $_FILES['path1']['name']; 
		$file2 = $_FILES['path2']['name']; 
		$file3 = $_FILES['path3']['name']; 
		$file4 = $_FILES['path4']['name']; 
		$file5 = $_FILES['path5']['name']; 								
		copy($_FILES['path1']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Varias/".trim($file1));
		copy($_FILES['path2']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Varias/".trim($file2));
		copy($_FILES['path3']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Varias/".trim($file3));
		copy($_FILES['path4']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Varias/".trim($file4));
		copy($_FILES['path5']['tmp_name'], $_SERVER['DOCUMENT_ROOT']."/Imagenes/Varias/".trim($file5)); 
	}else{ 
		echo "<b><font color=red>No file uploaded.</font></b><BR>No file available or file too big to upload.";
		?><script language="JavaScript"> 
			alert ("No se ha podido cargar la imagen."); 
        </script>;<?php
		echo '<script language="javascript" type="text/javascript">window.location="../Editor/subirImagen.php"</script>';		
	}
	///////////////

	$path1=trim($file1);
	$path2=trim($file2);	
	$path3=trim($file3);
	$path4=trim($file4);
	$path5=trim($file5);
						
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
		
	$query1='INSERT INTO image VALUES (\''.$idImagen.'\',\''.$path1.'\')';
	$query2='INSERT INTO image VALUES (\''.$idImagen.'\',\''.$path2.'\')';
	$query3='INSERT INTO image VALUES (\''.$idImagen.'\',\''.$path3.'\')';
	$query4='INSERT INTO image VALUES (\''.$idImagen.'\',\''.$path4.'\')';
	$query5='INSERT INTO image VALUES (\''.$idImagen.'\',\''.$path5.'\')';				
	modifyDB($query1);
	modifyDB($query2);	
	modifyDB($query3);	
	modifyDB($query4);
	modifyDB($query5);
	echo '<script language="javascript" type="text/javascript">window.location="../Editor/subirImagen.php"</script>';
?>
