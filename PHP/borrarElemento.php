<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
	
	$menu=$_GET['menu'];
	$table=$_GET['table'];
	$primaryKey=$_GET['primaryKey'];
	$value=$_GET['value'];			
		
	$query='DELETE FROM '.$table.' WHERE '.$primaryKey.'=\''.$value.'\'';
	modifyDB($query);
	
	
	if (($table == "news")){
		if ($menu == "Editor")	
			echo '<script language="javascript" type="text/javascript">window.location="/Noticias/noticiasEditor.php"</script>';
		else
			echo '<script language="javascript" type="text/javascript">window.location="/Noticias/noticiasAdmin.php"</script>';
	}else{ 
		if ($table == "team")
			echo '<script language="javascript" type="text/javascript">window.location="/Editor/equipos.php"</script>';
		else{ 
			if ($table == "jornada")
				echo '<script language="javascript" type="text/javascript">window.location="/Editor/jornada.php"</script>';
			else
				echo '<script language="javascript" type="text/javascript">window.location="/Editor/trofeos.php"</script>';
		}
	}
?>