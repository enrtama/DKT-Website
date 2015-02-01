<?php

	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();	

	$query='SELECT * FROM usergroup,championshipPlayer
			WHERE ( (usergroup.DNI = championshipPlayer.DNI) &&
					(championshipPlayer.idChampionship = \''.$_POST['idChampionship'].'\') &&
			        (usergroup.phoneNumber = \''.$_POST['id'].'\') )';
	
	$results=mysql_query($query);
	$row=mysql_fetch_array($results);

	$name=$row['userName'];
	$surname=$row['userSurname'];
	$dateBirth=$row['dateBirth'];
	$image=$row['image'];			
	$email=$row['email'];
	$position=$row['position'];
	$dorsal=$row['dorsal'];
	$gamesPlayed=$row['gamesPlayed'];
	$goals=$row['goals'];
	$assists=$row['assists'];
	$yellowCards=$row['yellowCards'];
	$redCards=$row['redCards'];

	echo '<div class="jugadorAjax">';
	echo '<div><a href="/Imagenes/Integrantes/'.$image.'" rel="lightbox" title="'.$name.' '.$surname.'"><img class="imgAjax" src="/Imagenes/Integrantes/'.$image.'"></a>';
	echo '<div class="atrAjax1">Nombre </div><div class="atrAjax2">'.$name.' '.$surname.'<br></div>';
	echo '<div class="atrAjax1">Edad </div><div class="atrAjax2">'.(date("Y") - substr($dateBirth,0,4)).'<br></div>';
	echo '<div class="atrAjax1">Posición </div><div class="atrAjax2">'.$position.'<br></div>';	
	echo '<div class="atrAjax1">Dorsal </div><div class="atrAjax2">'.$dorsal.'<br></div>';
	echo '<div class="atrAjax1">Partidos Jugados </div><div class="atrAjax2">'.$gamesPlayed.'<br></div>';	
	echo '<div class="atrAjax1">Goles </div><div class="atrAjax2">'.$goals.'<br></div>';	
	echo '<div class="atrAjax1">Asistencias </div><div class="atrAjax2">'.$assists.'<br></div>';	
	echo '<div class="atrAjax1">Tarjetas Amarillas </div><div class="atrAjax2">'.$yellowCards.'<br></div>';	
	echo '<div class="atrAjax1">Tarjetas Rojas </div><div class="atrAjax2">'.$redCards.'<br></div>';						
	echo '<div class="atrAjax1">Email </div><div class="atrAjax2"><a href="mailto:'.$email.'">'.$email.'</a><br></div>';
	echo '</div>';
?>