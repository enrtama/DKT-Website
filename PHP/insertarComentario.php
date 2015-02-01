<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
	
	$idComment;
	$idRelated=$_GET['idRelated'];
	$nickname=trim($_POST['nickname']);
	$date=date("Y-m-d"); 
	$content=trim($_POST['comment']);
			
	if (empty($idRelated)){
		$idRelated==0;
		$topic= "payments";
	}else
		$topic= "news";
			
	$query='INSERT INTO comments VALUES (\''.$idComment.'\',\''.$idRelated.'\',\''.$topic.'\',\''.$nickname.'\',\''.$date.'\',\''.$content.'\')';
	modifyDB($query);
	
	if (empty($idRelated))
		echo '<script language="javascript" type="text/javascript">window.location="/Pagos.php"</script>';
	else
		echo '<script language="javascript" type="text/javascript">window.location="/Noticias.php?idNew='.$idRelated.'"</script>';
?>