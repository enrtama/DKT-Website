<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Jugadores</title>
	<link rel="stylesheet" href="/CSS/LightBox/lightbox.css" type="text/css" media="screen"/>     
	<script type="text/javascript" src="/JavaScript/LightBox/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/LightBox/jquery-ui-1.8.18.custom.min.js"></script>
    <script type="text/javascript" src="/JavaScript/LightBox/lightbox.js"></script>      
    <script type="text/javascript" src="/JavaScript/generalFunctions.js"></script>    
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?>
</head>

<body>

<div id="contentLayer">      
    
    <div id="centerLayer">
    
        <div id="title">
        	<header1>Editor</header1>
        </div>
        
        <div id="menuLayer">
        	<button type="submit" class="buttonMenu" onClick="location.href='/Noticias/noticiasEditor.php'">
            <img src="/Imagenes/Iconos/news.png" title="News" align="absmiddle"/> 
            Noticias</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./Jornada.php'">
            <img src="/Imagenes/Iconos/classification.png" title="Sport Day" align="absmiddle"/> 
            Jornada</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./Trofeos.php'">
            <img src="/Imagenes/Iconos/prizes.png" title="Trophies" align="absmiddle"/> 
            Trofeos</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./Jugadores.php'">
            <img src="/Imagenes/Iconos/team.png" title="Players" align="absmiddle"/> 
            Jugadores</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./subirImagen.php'">
            <img src="/Imagenes/Iconos/image.png" title="Images" align="absmiddle"/> 
            Fotos</button>
            <br><br><br>
        </div>

	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div>
        <div id="textLayer">
			<?php
                include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
                connect();
                $query='SELECT * 
						FROM championshipPlayer,usergroup 
						WHERE( (usergroup.DNI="'.$_GET['idPlayer'].'") &&																	   	   			  			   (usergroup.DNI = championshipPlayer.DNI) &&																	   	   			  			   (championshipPlayer.idChampionship="'.$_GET['idChampionship'].'") )';
                $results=mysql_query($query);
				$row=mysql_fetch_array($results);
				$date = addslashes( substr($row['dateBirth'],5,2) .'/'.substr($row['dateBirth'],8,2) .'/'. substr($row['dateBirth'],0,4) );				
                    
				echo '
				<form enctype="multipart/form-data" id="formLayer" name="formModifyNew" action="./actualizarJugador.php?idPlayer='.$_GET['idPlayer'].'&idChampionship='.$_GET['idChampionship'].'" onReset="return confirmReset()" method="post">
					<fieldset id="personalData">
					<legend> Datos Deportivos </legend>			
						<label>Posicion:</label><br><input type="text" name="position" value="'.stripslashes($row['position']).'" size="20"><br>
						<label>Dorsal:</label><br><input type="number" name="dorsal" value="'.stripslashes($row['dorsal']).'" size="2"><br>
						<label>Partidos Jugados:</label><br><input type="number" name="gamesPlayed" value="'.stripslashes($row['gamesPlayed']).'" size="2"><br>
						<label>Goles:</label><br><input type="number" name="goals" value="'.stripslashes($row['goals']).'" size="2"><br>
						<label>Asistencias:</label><br><input type="number" name="assists" value="'.stripslashes($row['assists']).'" size="2"><br>
						<label>Tarjetas Amarillas:</label><br><input type="number" name="yellowCards" value="'.stripslashes($row['yellowCards']).'" size="2"><br>
						<label>Tarjetas Rojas:</label><br><input type="number" name="redCards" value="'.stripslashes($row['redCards']).'" size="2"><br>																		
					</fieldset><br><br>
					<button type="submit" class="buttonLogin"><img src="../Imagenes/Iconos/accept.png" title="Modify" align="absmiddle"/> Modify</button>
					<button type="reset" class="buttonLogin"><img src="../Imagenes/Iconos/clear.png" title="Clear" align="absmiddle"/> Clear</button>
				</form>';
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



