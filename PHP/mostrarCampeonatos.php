<?php

function showChampionship($year){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();

	$query='SELECT * FROM championship WHERE year=\''.$year.'\'';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	if ($numberResults==0)
		echo '<p style="margin:20px;">No hay campeonatos disponibles</p>';
	
	echo '<div id="accordion">';
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);	
		$idChampionship=$row['idChampionship'];
		$nameChampionship=$row['nameChampionship'];
		
		$query2='SELECT * FROM team WHERE idChampionship=\''.$idChampionship.'\'';
		$results2=mysql_query($query2);
		$numberResults2=mysql_num_rows($results2);
		
		echo '<div><h3><a href="#">'.$nameChampionship.'</a></h3>';
		echo '<div>';
		for($j=0; $j<$numberResults2; $j++){
			$row2=mysql_fetch_array($results2);			
			$nameTeam=$row2['nameTeam'];
			$idTeam=$row2['idTeam'];
			$idSport=$row2['idSport'];
			$year=$row2['year'];								
			
			echo "<td><a class=\"team\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam."&idChampionship=".$idChampionship."'>$nameTeam</a></td><br>";
		}
		echo '</div></div>';
	}	
	echo '</div>';
}

function showExpandedTeam($championship,$idTeam){
    include_once($_SERVER['DOCUMENT_ROOT']."/PHP/infoEquipo.php");
	// Classification
    showClassification($championship,$idTeam);
	// Resultados
	showResults($championship,$idTeam);
	//Players
	showPlayers($championship,$idTeam);	
}

function showPrizes(){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM prize';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	echo '<div class="prizes">';
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);
		$idPrize=$row['idPrize'];
		$idSport=$row['idSport'];
		$date=$row['year'];
			
		if ($idSport == 1)
			$sport = "Futbol";
		else if ($idSport == 2)
			$sport = "Futbol Sala";
		else if ($idSport == 3)
			$sport = "Baloncesto";
				
		$namePrize=$row['namePrize'];
		$pathImage=$row['image'];
		
		echo '<div class="tablePrize">';
		echo '<div class="titlePrize">'.$sport.' '.$date.'</div>';
		if (empty($pathImage))
			echo '<div class="imgPrize"><a href="/Imagenes/Trofeos/noTrophy.png" rel="lightbox" title="'.$sport.' '.$date.'"><img src="/Imagenes/Trofeos/noTrophy.png"></a></div>';
		else
        	echo '<div><a href="/Imagenes/Trofeos/'.$pathImage.'" rel="lightbox"><img src="/Imagenes/Trofeos/'.$pathImage.'"></a></div>';
		echo '<div class="namePrize">'.$namePrize.'</div>';
		echo '</div>';
	}
	echo '</div>';
}

?>

