<?php

function showImages(){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM image';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);
		$pathImage=$row['pathImage'];
		echo '<a href="/Imagenes/Varias/'.$pathImage.'" rel="lightbox[roadtrip]"><img class="photo" src="/Imagenes/Varias/'.$pathImage.'"></a>';		
	}
}

?>