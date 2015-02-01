<?php	

function showClassification($championship,$team){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM team WHERE idChampionship=\''.$championship.'\' ORDER BY points DESC, difference DESC, scored DESC';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	echo '<h6>Clasificación</h6>';
	echo '<table class="headerClassification">';
	echo '<tr>';
	echo '<th class="firstPosition"></th>';	
	echo '<th class="field1" >'.'Equipo'.'</th>';
	echo '<th class="field2" >'.'P'.'</th>';
	echo '<th class="field2" >'.'PJ'.'</th>';
	echo '<th class="field2" >'.'PG'.'</th>';	
	echo '<th class="field2" >'.'PE'.'</th>';
	echo '<th class="field2" >'.'PP'.'</th>';
	echo '<th class="field2" >'.'GF'.'</th>';	
	echo '<th class="field2" >'.'GC'.'</th>';
	echo '<th class="field2" >'.'DG'.'</th>';
	echo '</tr>';
	echo '</table>';
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);
		$idTeam=$row['idTeam'];
		$idSport=$row['idSport'];		
		$nameTeam=$row['nameTeam'];
		$played=$row['played'];
		$points=$row['points'];
		$won=$row['won'];
		$draw=$row['draw'];
		$lost=$row['lost'];
		$scored=$row['scored'];
		$conceded=$row['conceded'];
		$difference=$row['difference'];
		
		echo '<table class="tableClassification">';
		
		if ($team == $idTeam)
			echo '<tr>';	
		else
			echo '<tr>';

		if ($i == 0)
			echo '<td class="firstPosition"><img src="/Imagenes/Iconos/firstPosition.png"></td>';
		else
			echo '<td class="firstPosition">'.($i+1).'º</td>';
		
		if ($team == $idTeam){
			echo "<td style=\"width:230px;\"><a class=\"field11\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam."&idSport=".$idSport."&idChampionship=".$championship."'>$nameTeam</a></td>";				
			echo '<td class="field12" style="font-weight:bold;">'.$points.'</td>';
			echo '<td class="field12">'.$played.'</td>';		
			echo '<td class="field12">'.$won.'</td>';				
			echo '<td class="field12">'.$draw.'</td>';	
			echo '<td class="field12">'.$lost.'</td>';
			echo '<td class="field12">'.$scored.'</td>';
			echo '<td class="field12">'.$conceded.'</td>';				
			echo '<td class="field12">'.$difference.'</td>';			
			echo '</tr></table>';
		}else{
			echo "<td style=\"width:230px;\"><a class=\"field1\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam."&idSport=".$idSport."&idChampionship=".$championship."'>$nameTeam</a></td>";	
			echo '<td class="field2" style="font-weight:bold;">'.$points.'</td>';
			echo '<td class="field2">'.$played.'</td>';		
			echo '<td class="field2">'.$won.'</td>';				
			echo '<td class="field2">'.$draw.'</td>';	
			echo '<td class="field2">'.$lost.'</td>';
			echo '<td class="field2">'.$scored.'</td>';
			echo '<td class="field2">'.$conceded.'</td>';				
			echo '<td class="field2">'.$difference.'</td>';			
			echo '</tr>';
			echo '</table>';
		}

	}
}

function showPlayers($idChampionship,$idTeam){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	
	$query='SELECT * FROM usergroup,championshipPlayer,team
			WHERE ( (usergroup.DNI = championshipPlayer.DNI) &&
					(championshipPlayer.idChampionship = \''.$idChampionship.'\' ) &&
					(championshipPlayer.idTeam = \''.$idTeam.'\' ) &&
					(championshipPlayer.idTeam = team.idTeam ) )';
					
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
		
	echo '<h6>Jugadores</h6>';
	
	echo '<div class="plantilla">';	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);			
		$id=$row['DNI'];
		$sport=$row['idSport'];	
		$name=$row['userName'];
		$surname=$row['userSurname'];
		$dateBirth=$row['dateBirth'];
		$phone=$row['phoneNumber'];
		$dorsal=$row['dorsal'];
		$position=$row['position'];
		$nameTeam=$row['nameTeam'];
		$imageTeam=$row['imageTeam'];					
				
		echo '<div class="jugador" onClick="javascript:getPlayer('.$phone.','.$idChampionship.')">';
		echo '<div class="nombreJugador">'.$name.'</div>';		
		if ( ($sport == 1) || ($sport == 2) )
			echo '<div><img src="/Imagenes/Iconos/shirtSoccer.png"></div>';
		else
			echo '<div><img src="/Imagenes/Iconos/shirtBasket.png"></div>';
		echo '<div <div style="margin-top:-45px;"><div class="atrPlayer">Dorsal '.$dorsal.'</div>';
		echo '<div class="atrPlayer">'.$position.'</div>';		
		echo '<div class="atrPlayer">'.(date("Y") - substr($dateBirth,0,4)).' Años<br></div>';		
		echo '</div></div>';			
	}	
		if ($numberResults != 0){
			if ($sport == 1){
				if (empty($imageTeam))
					echo '<div><a href="/Imagenes/pegatina.jpg" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/pegatina.jpg"></a></div>';
				else
					echo '<div><a href="/Imagenes/logo.jpg" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/logo.jpg"></a></div>';	
			}else if ($sport == 2){
				if (empty($imageTeam))
					echo '<div><a href="/Imagenes/pegatina.jpg" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/pegatina.jpg"></a></div>';
				else{
					echo '<div><a href="/Imagenes/Integrantes/'.$imageTeam.'" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/Integrantes/'.$imageTeam.'"></a></div>';}
			}else if ($sport == 3){
				if (empty($imageTeam))				
					echo '<div><a href="/Imagenes/pegatina.jpg" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/pegatina.jpg"></a></div>';
				else
					echo '<div><a href="/Imagenes/logo.jpg" rel="lightbox" title="'.$nameTeam.'"><img class="imgEquipo" src="/Imagenes/logo.jpg"></a></div>';				
			}
		}
		echo '</div>';
}

function showResults($championship,$idTeam){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	
	$query='SELECT nameTeam FROM team WHERE ((idTeam=\''.$idTeam.'\') && (idChampionship=\''.$championship.'\'))';
	
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	$row=mysql_fetch_array($results);
	$team=$row['nameTeam'];		
		
	$query2='SELECT * FROM sportDay WHERE ( (idChampionship=\''.$championship.'\') && 
											((firstTeam=\''.$team.'\') || (secondTeam=\''.$team.'\')) ) 
											ORDER BY sportDay ASC ';
	$results2=mysql_query($query2);
	$numberResults2=mysql_num_rows($results2);	
		
	if ($numberResults2==0){
		echo '<br>';
		echo '<h6>Resultados</h6>';
		echo '<p style="text-align:center;">No hay resultados disponibles</p>';
		echo '<br>';	
	}else{
		echo '<br><h6>Resultados</h6>';
		echo '<table class="tableResults">';
	
		for($i=0; $i<$numberResults2; $i++){
			$row2=mysql_fetch_array($results2);
			
			$team1=$row2['firstTeam'];
			$team2=$row2['secondTeam'];
			$goalsTeam1=$row2['goalsFirstTeam'];
			$goalsTeam2=$row2['goalsSecondTeam'];
			$auxDate=$row2['dateDay'];		
			
			$date = addslashes( substr($auxDate,8,2) .'-'.substr($auxDate,5,2) .'-'. substr($auxDate,2,2) );
	
			$query3='SELECT * FROM team WHERE nameTeam=\''.$team1.'\'';
			$results3=mysql_query($query3);
			$numberResults3=mysql_num_rows($results3);
			$row3=mysql_fetch_array($results3);	
	
			$query4='SELECT * FROM team WHERE nameTeam=\''.$team2.'\'';
			$results4=mysql_query($query4);
			$numberResults4=mysql_num_rows($results4);
			$row4=mysql_fetch_array($results4);	
	
			$idTeam1=$row3['idTeam'];
			$idTeam2=$row4['idTeam'];
			$sport=$row3['idSport'];
			$championship=$row3['idChampionship'];			
	
			echo '<tr>';
			echo '<td class="field2">J'.($i+1).'</td>';	
			if ($team==$team1)
				echo "<td style=\"width:185px;text-align:right;font-weight:bold;font-style:italic;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam1."&idChampionship=".$championship."'>$team1</a></td>";							
			else
				echo "<td style=\"width:185px;text-align:right;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam1."&idChampionship=".$championship."'>$team1</a></td>";							
			if (empty($goalsTeam1) && (empty($goalsTeam2)))
				echo '<td class="goals" style="color:#F60;"> - </td>';		
			else
				echo '<td class="goals" style="color:#F60;">'.$goalsTeam1.'</td>';		
			if (empty($goalsTeam1) && (empty($goalsTeam2)))
				echo '<td class="goals" style="color:#F60;"> - </td>';	
			else
				echo '<td class="goals" style="color:#F60;">'.$goalsTeam2.'</td>';
			if ($team==$team2)
				echo "<td style=\"width:185px;font-weight:bold;font-style:italic;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam2."&idChampionship=".$championship."'>$team2</a></td>";							
			else
				echo "<td style=\"width:185px;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$idTeam2."&idChampionship=".$championship."'>$team2</a></td>";
			echo '<td class="fieldDate">'.$date.'</td>';									
			echo '</tr>';				
		}
			echo '</table>';
	}
}

function showExpandedResults($idChampionship,$idTeam){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();

	$query2='SELECT MAX(sportDay) AS "sportDay" FROM sportDay WHERE idChampionship=\''.$idChampionship.'\'';
	$results2=mysql_query($query2);
	$row=mysql_fetch_array($results2);
	$jornadaMaxima=$row['sportDay'];

	$query3='SELECT * FROM team WHERE ( (idChampionship=\''.$idChampionship.'\') &&
										(idTeam=\''.$idTeam.'\') )';
	$results3=mysql_query($query3);
	$row3=mysql_fetch_array($results3);
	$checkedNameTeam=$row3['nameTeam'];	

	for($i=0; $i<$jornadaMaxima; $i++){
		
		$query='SELECT * FROM sportDay WHERE ( (idChampionship=\''.$idChampionship.'\') &&	
											   (sportDay=\''.($i+1).'\') )';
		$results=mysql_query($query);
		$numberResults=mysql_num_rows($results);		
		echo '<table class="tableResults">';		
		echo '<div class="jornada">Jornada '.($i+1).'</div>';

		for($j=0; $j<$numberResults; $j++){
	
			$row=mysql_fetch_array($results);
			$team1=$row['firstTeam'];
			$team2=$row['secondTeam'];
			$goalsTeam1=$row['goalsFirstTeam'];
			$goalsTeam2=$row['goalsSecondTeam'];
		
			echo '<tr>';
			if ($checkedNameTeam==$team1)
				echo "<td style=\"width:230px;text-align:right;font-weight:bold;font-style:italic;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$selectedTeam."&idChampionship=".$idChampionship."'>$team1</a></td>";
			else
				echo "<td style=\"width:230px;text-align:right;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$selectedTeam."&idChampionship=".$idChampionship."'>$team1</a></td>";				
			if (empty($goalsTeam1) && (empty($goalsTeam2)))
				echo '<td class="goals" style="color:#F60;"> - </td>';		
			else
				echo '<td class="goals" style="color:#F60;">'.$goalsTeam1.'</td>';		
			if (empty($goalsTeam1) && (empty($goalsTeam2)))
				echo '<td class="goals" style="color:#F60;"> - </td>';	
			else
				echo '<td class="goals" style="color:#F60;">'.$goalsTeam2.'</td>';
			if ($checkedNameTeam==$team2)
				echo "<td style=\"width:230px;text-align:left;font-weight:bold;font-style:italic;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$selectedTeam."&idChampionship=".$championship."'>$team2</a></td>";
			else
				echo "<td style=\"width:230px;text-align:left;\"><a class=\"field4\" href=javascript:window.location='/Deportes/infoCampeonato.php?idTeam=".$selectedTeam."&idChampionship=".$championship."'>$team2</a></td>";
			echo '</tr>';			
		}
		echo '</table>';			
	}
	
}

?>