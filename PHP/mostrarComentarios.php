
<script src="JavaScript/generalFunctions.js" type="text/javascript"></script>

<?php

function showComments($topic,$related=0){
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
	connect();
	$query='SELECT * FROM comments WHERE ( (idRelated=\''.$related.'\') && (topic=\''.$topic.'\') )';
	$results=mysql_query($query);
	$numberResults=mysql_num_rows($results);	
	
	echo '<p class="commentTitle">Todos los comentarios ('.$numberResults.')</p>';
	
	for($i=0; $i<$numberResults; $i++){
		$row=mysql_fetch_array($results);	
		$person=$row['nickname'];
		$date=$row['dateComment'];
		$content=$row['content'];
		$date2=date("d-m-Y",strtotime($date));
		
		echo '<p class="comment">';
		echo $content.'<br></p>';	
		echo '<p class="infoComment">Escrito por '.$person.' en ';
		echo $date2.'<br></p>';
	}
	
	echo '<p class="comment">';
	echo '<form id="formLayer" name="formInsertComment" action="/PHP/insertarComentario.php?idRelated='.$related.'" onReset="return confirmReset()" method="post">
		  <br><br><fieldset id="capaDatosPersonales">
		  <label>Nickname:</label><br><input type="text" name="nickname" value="" size="20"><br><br>		  
		  <label>Comentario:</label><br><textarea id="comment" name="comment" onclick="removeText(this);" onfocus="removeText(this);" rows="15" cols="80" style="width: 400px;height:80px;" type="textarea" name="content" rows="6" cols="40" wrap="soft">Escribe algo...</textarea><br><br>	
		  <button type="submit" class="sendButton">Insertar</button>
          <button type="reset" class="resetButton">Borrar</button>
	</fieldset></form>';

	echo '</p>';
}

?>

