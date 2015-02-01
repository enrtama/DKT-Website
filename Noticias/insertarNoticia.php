<?php
	$date = addslashes( substr(trim($_POST['datepicker']),6,4) .'-'.substr(trim($_POST['datepicker']),3,2) .'-'. substr(trim($_POST['datepicker']),0,2) );
	$sportSelected=addslashes(trim($_POST['sport']));
	$time=addslashes(trim($_POST['time']));
	$title=addslashes(trim($_POST['title']));
	$content=trim($_POST['elm1']);
				
	// Get image path
	$aux1 = substr($content,strpos($content,"src"),strlen($content));
	$aux2 = substr($aux1,strpos($aux1,'/')+1,strlen($aux1));
	$aux3 = substr($aux2,0,strpos($aux2,'"'));
	$content2 = substr($aux1,strpos($aux1,'>')+1,strlen($aux1));					
	$imgAux = substr($aux3,0,(strlen($aux3)-1));
	$img = ereg_replace("tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/","",$imgAux);
	
	$menu=$_GET['menu'];
	
	if ($sportSelected == 1)
		$sport = "Futbol";
	else if ($sportSelected == 2)
		$sport = "Futbol Sala";
	else if ($sportSelected == 3)
		$sport = "Baloncesto";
	else if ($sportSelected == 4)
		$sport = "General";		
		
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
		
	$query='INSERT INTO news VALUES (\''.$idNew.'\',\''.$sport.'\',\''.$date.'\',\''.$time.'\',\''.$title.'\',\''.$content2.'\',\''.$img.'\')';

	modifyDB($query);
	if ($menu == "Editor")
		echo '<script language="javascript" type="text/javascript">window.location="./noticiasEditor.php"</script>';
	else
		echo '<script language="javascript" type="text/javascript">window.location="./noticiasAdmin.php"</script>';
?>



