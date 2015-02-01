<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Trofeos</title>
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
                $query='SELECT * FROM prize';
                $results=mysql_query($query);
                $numberResults=mysql_num_rows($results);
                
                for($i=0; $i<$numberResults; $i++){
                    $row=mysql_fetch_array($results);
					$idPrize=$row['idPrize'];
                    $idSport=$row['idSport'];
						
						if ($idSport == 1)
							$sport = "Futbol";
						else if ($idSport == 2)
							$sport = "Futbol Sala";
						else if ($idSport == 3)
							$sport = "Baloncesto";
							
					$namePrize=$row['namePrize'];
					$yearPrize=$row['year'];					
					$pathImage=$row['image'];
                    
                    echo '<table class="tableEditor">';
                    echo '<tr>';
					if (empty($pathImage))
					    echo '<td rowspan="2"><a href="/Imagenes/Trofeos/noTrophy.png" rel="lightbox"><img class="image1" src="/Imagenes/Trofeos/noTrophy.png"></a></td>';
					else
                    	echo '<td rowspan="2"><a href="/Imagenes/Trofeos/'.$pathImage.'" rel="lightbox"><img class="image1" src="/Imagenes/Trofeos/'.$pathImage.'"></a></td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="titleTrophy">Trofeo - '.$sport.' '.$yearPrize.'<br>'.$namePrize.'</td>';
                    echo '</tr>';
                    echo '</table><br>';
					echo '<div class="iconNew">'."<a href=javascript:confirmModify('./modificarTrofeo.php?idPrize=".$idPrize."')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/modify.png\" title=\"Modify\" align=\"absmiddle\"> Modificar</button>".'</a>';
					echo "<a href=javascript:confirmDelete('../PHP/borrarElemento.php?table=prize&primaryKey=idPrize&value=".$idPrize."&menu=trofeos')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/delete.png\"title=\"Delete\" align=\"absmiddle\"> Borrar</button>".'</a>'.'</div><br>';					
				}
				echo "<a href=javascript:confirmInsert('./nuevoTrofeo.php')>
				<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/insert.png\"title=\"Insert\" align=\"absmiddle\"> Insertar</button>".'</a>';
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



