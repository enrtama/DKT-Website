<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Imagenes</title>
    <script type="text/javascript" src="../JavaScript/generalFunctions.js"></script>
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

				<form enctype="multipart/form-data" id="formLayer" name="formModifyNew" action="../PHP/insertarImagen.php" onReset="return confirmReset()" method="post">
                    <fieldset id="personalData">
                    <legend>Images Information</legend><br>	   
                    <label>Imagen 1: </label><br><input type="hidden" name="MAX_FILE_SIZE" value="5000000"><input type="file" name="path1"><br>  
                    <label>Imagen 2: </label><br><input type="hidden" name="MAX_FILE_SIZE" value="5000000"><input type="file" name="path2"><br>   
                    <label>Imagen 3: </label><br><input type="hidden" name="MAX_FILE_SIZE" value="5000000"><input type="file" name="path3"><br> 
                    <label>Imagen 4: </label><br><input type="hidden" name="MAX_FILE_SIZE" value="5000000"><input type="file" name="path4"><br> 
                    <label>Imagen 5: </label><br><input type="hidden" name="MAX_FILE_SIZE" value="5000000"><input type="file" name="path5">
                    <br><br><br>
                    </fieldset><br><br>
					<button type="submit" class="buttonLogin"><img src="../Imagenes/Iconos/accept.png" title="Modify" align="absmiddle"/> Insert</button>
					<button type="reset" class="buttonLogin"><img src="../Imagenes/Iconos/clear.png" title="Clear" align="absmiddle"/> Clear</button>
				</form>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



