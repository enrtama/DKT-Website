<?php

function showMembers(){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM usergroup';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);
		$dni=$row['dni'];
		$name=$row['userName'];
		$surname=$row['userSurname'];
		$dateBirth=$row['dateBirth'];
		$date=date("d-m-Y",strtotime($dateBirth));		
		$address=$row['address'];
		$phone=$row['phoneNumber'];
		$mail=$row['email'];
		$pathImage=$row['image'];
		
		echo '<table class="table1">';
		echo '<tr>';
		if (empty($pathImage))
			echo '<td rowspan="8"><a href="/Imagenes/Integrantes/noUser.png" rel="lightbox"><img class="image1" src="/Imagenes/Integrantes/noUser.png"></a></td>';
		else		
			echo '<td rowspan="8"><a href="/Imagenes/Integrantes/'.$pathImage.'" rel="lightbox" title="'.$name.' '.$surname.'"><img class="image1" src="/Imagenes/Integrantes/'.$pathImage.'"></a></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">Nombre </td><td class="atr1">'.$name.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">Apellidos </td><td class="atr1">'.$surname.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">Fecha Nacimiento </td><td class="atr1">'.$date.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">Edad </td><td class="atr1">'.(date("Y") - substr($dateBirth,0,4)).'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">Dirección </td><td class="atr1">'.$address.'</td>';
		echo '</tr>';		
		echo '<tr>';
		echo '<td class="atr0">Telefono </td><td class="atr1">'.$phone.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="atr0">E-mail </td><td class="atr1"><a href="mailto:'.$mail.'">'.$mail.'</a></td>';
		echo '</tr>';	
		echo '</table><br>';
	}
}
?>

