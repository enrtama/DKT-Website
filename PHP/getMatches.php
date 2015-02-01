<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	
	// Próximo Partido
	$query='SELECT * FROM matches
			WHERE ( (nameMatch="Proximo Partido") && 
				    (idChampionship=\''.$_POST['id'].'\') )';
	$results=mysql_query($query);
	$row=mysql_fetch_array($results);
	
	$firstTeam=$row['firstTeam'];
	$secondTeam=$row['secondTeam'];
	$date = addslashes( substr($row['date'],8,2) .'/'.substr($row['date'],5,2) .'/'. substr($row['date'],0,4) );
	$time=$row['time'];
	$place=$row['place'];
	
	// Último Partido
	$query2='SELECT * FROM matches
			WHERE ( (nameMatch="Ultimo Partido") && 
				    (idChampionship=\''.$_POST['id'].'\') )';
	$results2=mysql_query($query2);
	$row2=mysql_fetch_array($results2);
	
	$firstTeam2=$row2['firstTeam'];
	$secondTeam2=$row2['secondTeam'];
	$goals1=$row2['goals1'];
	$goals2=$row2['goals2'];	
	$date2 = addslashes( substr($row2['date'],8,2) .'/'.substr($row2['date'],5,2) .'/'. substr($row2['date'],0,4) );
	$time2=$row2['time'];
	$place2=$row2['place'];
	
	echo '<div class="matchAjax" style="margin-left:70px;">';
	echo '<h6>Próximo Partido</h6>';
	echo '<div class="teamAjax">'.$firstTeam.'</div>';
	echo '<div class="versusAjax">VS</div>';
	echo '<div class="teamAjax">'.$secondTeam.'</div>';
	if ($date == "00/00/0000")
		echo '<div class="dateAjax"><img class="imgMatch" src="/Imagenes/Iconos/calendar2.png">Sin Determinar</div>';		
	else
		echo '<div class="dateAjax"><img class="imgMatch" src="/Imagenes/Iconos/calendar2.png">'.$date.'</div>';
	if ($time == "00:00:00")
		echo '<div class="timeAjax"><img class="imgMatch" src="/Imagenes/Iconos/clock.png">Sin Determinar</div>';		
	else		
		echo '<div class="timeAjax"><img class="imgMatch" src="/Imagenes/Iconos/clock.png">'.$time.'</div>';
	if (empty($place))
		echo '<div class="placeAjax"><img class="imgMatch" src="/Imagenes/Iconos/stadium.png">Sin Determinar</div>';		
	else
		echo '<div class="placeAjax"><img class="imgMatch" src="/Imagenes/Iconos/stadium.png">'.$place.'</div>';	
	echo '</div>';
	echo '<div class="matchAjax">';	
	echo '<h6>Último Partido</h6>';	
	echo '<div class="teamAjax" style="margin-top:30px;">'.$firstTeam2.'</div>';
	echo '<div class="goalAjax">'.$goals1.'</div>';
	echo '<div class="teamAjax" style="margin-top:10px;">'.$secondTeam2.'</div>';	
	echo '<div class="goalAjax">'.$goals2.'</div>';	
	echo '<div class="dateAjax" style="margin-top:20px;"><img class="imgMatch" src="/Imagenes/Iconos/calendar2.png">'.$date2.'</div>';	
	echo '<div class="timeAjax"><img class="imgMatch" src="/Imagenes/Iconos/clock.png">'.$time2.'</div>';
	echo '<div class="placeAjax"><img class="imgMatch" src="/Imagenes/Iconos/stadium.png">'.$place2.'</div>';
	echo '</div>';
	
	// Goleadores
	$query3='SELECT * FROM championshipPlayer,usergroup
			WHERE ( (idChampionship=\''.$_POST['id'].'\') &&
					(championshipPlayer.DNI = usergroup.DNI) ) ORDER BY goals DESC LIMIT 0,5';
	$results3=mysql_query($query3);
	$numberResults3=mysql_num_rows($results3);
		
	echo '<div class="statisticAjax" style="margin-left:145px;">';
	echo '<h6>Goles</h6>';	
	for($i=0; $i<$numberResults3; $i++){
		$row3=mysql_fetch_array($results3);	
		$goals=$row3['goals'];
		$username=$row3['userName'];
		echo '<div class="userRanking">'.$username.'</div>';		
		echo '<div class="dataRanking">'.$goals.'</div>';
	}
	echo '</div>';
	
	// Asistentes
	$query3='SELECT * FROM championshipPlayer,usergroup
			WHERE ( (idChampionship=\''.$_POST['id'].'\') &&
					(championshipPlayer.DNI = usergroup.DNI) ) ORDER BY assists DESC LIMIT 0,5';
	$results3=mysql_query($query3);
	$numberResults3=mysql_num_rows($results3);
		
	echo '<div class="statisticAjax">';
	echo '<h6>Asistencias</h6>';	
	for($i=0; $i<$numberResults3; $i++){
		$row3=mysql_fetch_array($results3);	
		$assists=$row3['assists'];
		$username=$row3['userName'];
		echo '<div class="userRanking">'.$username.'</div>';		
		echo '<div class="dataRanking">'.$assists.'</div>';
	}
	echo '</div>';

?>