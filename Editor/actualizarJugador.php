<?php	
	$position=addslashes(trim($_POST['position']));
	$dorsal=addslashes(trim($_POST['dorsal']));
	$gamesPlayed=addslashes(trim($_POST['gamesPlayed']));
	$goals=addslashes(trim($_POST['goals']));
	$assists=addslashes(trim($_POST['assists']));			
	$yellowCards=addslashes(trim($_POST['yellowCards']));
	$redCards=addslashes(trim($_POST['redCards']));
			
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();
	
	$query='SELECT * FROM championshipPlayer WHERE ( (DNI="'.$_GET['idPlayer'].'") &&
											     	 (idChampionship="'.$_GET['idChampionship'].'"))';
	$results=mysql_query($query);
    $row=mysql_fetch_array($results);
	
	$idChampionship=$row['idChampionship'];
	$dni=$row['DNI'];	
					
	$query='UPDATE championshipPlayer SET idChampionship=\''.$idChampionship.'\',DNI=\''.$dni.'\',position=\''.$position.'\',dorsal=\''.$dorsal.'\',gamesPlayed=\''.$gamesPlayed.'\',goals=\''.$goals.'\',assists=\''.$assists.'\',yellowCards=\''.$yellowCards.'\',redCards=\''.$redCards.'\'
	WHERE DNI=\''.$dni.'\' && idChampionship=\''.$idChampionship.'\'';
	
	modifyDB($query);			
	echo '<script language="javascript" type="text/javascript">window.location="/Editor/Jugadores.php"</script>';
?>







