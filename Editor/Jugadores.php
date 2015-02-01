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
                $query='SELECT * FROM championshipPlayer,usergroup,championship 
								 WHERE ( (championshipPlayer.DNI = usergroup.DNI) && 
										 (championshipPlayer.idChampionship = championship.idChampionship) )';
                $results=mysql_query($query);
                $numberResults=mysql_num_rows($results);
                
                for($i=0; $i<$numberResults; $i++){
                    $row=mysql_fetch_array($results);
					$name=$row['userName'];
					$nameChampionship=$row['nameChampionship'];					
					$idChampionship=$row['idChampionship'];                 
					$dni=$row['DNI'];                 
				
         	 		echo '<div class="infoPlayer"><a href=javascript:confirmModify("./modificarJugador.php?idPlayer='.$dni.'&idChampionship='.$idChampionship.'")>'.$name.' '.$nameChampionship.'</a></div>';		
				}
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



