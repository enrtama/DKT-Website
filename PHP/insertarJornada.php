<?php
	$idSportDay;
	$sportDay=addslashes(trim($_POST['sportDay']));	
	$place=addslashes(trim($_POST['place']));
	$equipo1=addslashes(trim($_POST['equipo1']));
	$equipo2=addslashes(trim($_POST['equipo2']));
	$goles1=addslashes(trim($_POST['goles1']));		
	$goles2=addslashes(trim($_POST['goles2']));
	$date = addslashes( substr(trim($_POST['datepicker']),6,4) .'-'.substr(trim($_POST['datepicker']),3,2) .'-'. substr(trim($_POST['datepicker']),0,2) );	
	$championship=addslashes(trim($_POST['championship']));	
		
	/////////////////////////////////////////////
	
	if ($goles1 > $goles2){
		$ganador1=1;
		$ganador2=0;
	}else{
		if ($goles1 < $goles2){
			$ganador1=0;
			$ganador2=1;
		}
	 	else {
			if ($goles1 == $goles2){
				$ganador1=2;
				$ganador2=2;
			}
		}	
	}
	
	/////////////////////////////////////////////			
			
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	

	$query='SELECT * FROM team WHERE ((nameTeam=\''.$equipo1.'\') && (idChampionship=\''.$championship.'\'))';
	$results=mysql_query($query);
	$row=mysql_fetch_array($results);
	
	$query2='SELECT * FROM team WHERE ((nameTeam=\''.$equipo2.'\') && (idChampionship=\''.$championship.'\'))';
	$results2=mysql_query($query2);
	$row2=mysql_fetch_array($results2);
	
	$team1=$row['nameTeam'];	
	$team2=$row2['nameTeam'];		
	$sportSelected=$row['idSport'];
	
	if ($sportSelected == 1)
		$sport = "Futbol";
	else if ($sportSelected == 2)
		$sport = "Futbol Sala";
	else if ($sportSelected == 3)
		$sport = "Baloncesto";
	
	$idTeam1=$row['idTeam'];
	$played1=$row['played']+1;
	$idTeam2=$row2['idTeam'];
	$played2=$row2['played']+1;
	
	if ($ganador1 == 1){
		$points1=$row['points']+3;				$points2=$row2['points'];
		$won1=$row['won']+1;					$won2=$row2['won'];
		$draw1=$row['draw'];					$draw2=$row2['draw'];
		$lost1=$row['lost'];					$lost2=$row2['lost']+1;
	} else {
		if ($ganador1 == 0){
					$points1=$row['points'];		$points2=$row2['points']+3;
					$won1=$row['won'];				$won2=$row2['won']+1;
					$draw1=$row['draw'];			$draw2=$row2['draw'];
					$lost1=$row['lost']+1;			$lost2=$row2['lost'];
		}
	 	else {
			if ($ganador1 == 2) {
						$points1=$row['points']+1;			$points2=$row2['points']+1;
						$won1=$row['won'];					$won2=$row2['won'];
						$draw1=$row['draw']+1;				$draw2=$row2['draw']+1;
						$lost1=$row['lost'];				$lost2=$row2['lost'];
			}
		}
	}
	
	$scored1=$row['scored']+$goles1;						$scored2=$row2['scored']+$goles2;
	$conceded1=$row['conceded']+$goles2;					$conceded2=$row2['conceded']+$goles1;
	$difference1=$row['difference']+($goles1-$goles2);		$difference2=$row2['difference']+($goles2-$goles1);			
	
	// Update team table
	$query1='UPDATE team SET idSport=\''.$sportSelected.'\',idChampionship=\''.$championship.'\',nameTeam=\''.$team1.'\',played=\''.$played1.'\',points=\''.$points1.'\',won=\''.$won1.'\',draw=\''.$draw1.'\',lost=\''.$lost1.'\',scored=\''.$scored1.'\',conceded=\''.$conceded1.'\',difference=\''.$difference1.'\' WHERE idTeam=\''.$idTeam1.'\'';
	
	$query2='UPDATE team SET idSport=\''.$sportSelected.'\',idChampionship=\''.$championship.'\',nameTeam=\''.$team2.'\',played=\''.$played2.'\',points=\''.$points2.'\',won=\''.$won2.'\',draw=\''.$draw2.'\',lost=\''.$lost2.'\',scored=\''.$scored2.'\',conceded=\''.$conceded2.'\',difference=\''.$difference2.'\' WHERE idTeam=\''.$idTeam2.'\'';

	$query3='INSERT INTO sportDay VALUES (\''.$idSportDay.'\',\''.$sportDay.'\',\''.$championship.'\',\''.$date.'\',\''.$place.'\',\''.$sport.'\',\''.$team1.'\',\''.$team2.'\',\''.$goles1.'\',\''.$goles2.'\')';

	modifyDB($query1);
	modifyDB($query2);
	modifyDB($query3);	
	
	echo '<script language="javascript" type="text/javascript">window.location="/Editor/Jornada.php"</script>';
?>
