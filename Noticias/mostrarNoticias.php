<?php

function countNews(){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	
	$query='SELECT * FROM news';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);	
	return $numberResults;
}

function showNews($inicio,$elementos){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	
	$query='SELECT * FROM news ORDER BY dateNew DESC LIMIT '.$inicio.','.$elementos.'';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);
		$idNew=$row['idNew'];
		$pathImage=$row['image'];
		$sport=$row['sportNew'];
		$title=$row['title'];
		$date=$row['dateNew'];
		$content=$row['content'];
		$date2=date("d-m-Y",strtotime($date));

		echo '<table class="table1">';
		echo '<tr>';
		if (empty($pathImage))
			echo '<td class="img" rowspan="5"><img class="image1" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/noNew.png"></td>';		
		else
			echo '<td class="img" rowspan="5"><img class="image1" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/'.$pathImage.'"></td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="sportNew">[Noticia] - '.$sport.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo "<td class=\"titleNew\"><a href=javascript:window.location='Noticias.php?idNew=".$idNew."'>$title</a></td>";
		echo '</tr>';
		echo '<tr>';
		echo '<td class="dateNew">'.$date2.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo '<td class="contentNew" >'.substr($content,0,100).'...</td>';
		echo '</tr>';
		echo '</table><br>';
	
	}
}

function showLastNews(){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM news ORDER BY dateNew DESC';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);
	
	if ($numberResults>4)
		$cont=4;
	else
		$cont=$numberResults;
	
	echo '<h6>Últimas Noticias<h6>';
	
	for($i=0; $i<$cont; $i++){
		$row=mysql_fetch_array($results);
		$idNew=$row['idNew'];
		$pathImage=$row['image'];
		$sport=$row['sportNew'];
		$title=$row['title'];
		$date=$row['dateNew'];
		$content=$row['content'];
		$date2=date("d-m-Y",strtotime($date));
				
		echo '<table class="tableLastNew">';		
		echo '<tr>';
		echo '<td class="sportNew2">[Noticia] - '.$sport.'</td>';
		echo '</tr>';
		echo '<tr>';
		echo "<td class=\"titleNew2\"><a href=javascript:window.location='Noticias.php?idNew=".$idNew."'>$title</a></td>";
		echo '</tr>';
		echo '<tr>';
		echo '<td class="dateNew2">'.$date2.'</td></tr>';
		echo '</tr>';
		echo '<tr>';
		if (empty($pathImage))
			echo '<td class="lastNewFrame"><img class="imageLastNew" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/noNew.png"></td>';
		else
			echo '<td class="lastNewFrame"><img class="imageLastNew" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/'.$pathImage.'"></td>';
	
		echo '</tr>';
		echo '<tr>';
		echo '<td class="contentNew2" >'.substr($content,0,100).'...</td>';
		echo '</tr>';
		echo '<tr>';
		echo '</tr>';		
		echo '</table><br>';
		
		echo "<div id=\"leerNoticia\"><a href=javascript:window.location='Noticias.php?idNew=".$idNew."'>Leer Más</a></div>";
		echo '<div class="separador"></div>';		
	}
	if ($numberResults == 0)
		echo '<div id="masNoticias">No Hay noticias Disponibles</div>';
	else
		echo '<div id="masNoticias"><a href="Noticias.php">Más Noticias</a></div>';
}

function showExpandedNew($idNew){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM news WHERE idNew=\''.$idNew.'\'';
	$results=mysql_query($query);
	$row=mysql_fetch_array($results);
	
	$idNew=$row['idNew'];
	$pathImage=$row['image'];
	$sport=$row['sportNew'];
	$title=$row['title'];
	$date=$row['dateNew'];
	$content=$row['content'];
	$date2=date("d-m-Y",strtotime($date));

	echo '<table class="table2">';
	echo '<tr>';
	echo '<td class="sportNew2">[Noticia] - '.$sport.'</td>';
	echo '</tr>';
	echo '<tr>';
	echo "<td class=\"titleNew2\"><a href=javascript:window.location='Noticias.php?idNew=".$idNew."'>$title</a></td>";
	echo '</tr>';
	echo '<tr>';
	echo '<td class="dateNew2">'.$date2.'</td></tr>';
	echo '</tr>';
	echo '<tr>';
	if (empty($pathImage))
		echo '<td><a href="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/noNew.png" rel="lightbox" title="'.$title.'"><img class="image2" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/noNew.png"></a></td>';
	else
		echo '<td><a href="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/'.$pathImage.'" rel="lightbox" title="'.$title.'"><img class="image2" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/'.$pathImage.'"></a></td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td class="contentNew2" >'.$content.'</td>';
	echo '</tr>';
	echo '</table><br>';
	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/mostrarComentarios.php");
	showComments("news",$idNew);
	
	echo '<div id="back"><a href="/Noticias.php">Volver</a></div>';
}

?>

