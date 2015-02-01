<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Trofeos</title>
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

				<form enctype="multipart/form-data" id="formLayer" name="formModifyNew" action="../PHP/insertarTrofeo.php" onReset="return confirmReset()" method="post">
					<fieldset id="personalData">
					<legend>Prize Information</legend><br>
                    <label class="formField">Deporte: </label><br>
						<select name="sport">
							<option value="1">Futbol</option>
							<option value="2">Futbol Sala</option>
							<option value="3">Baloncesto</option>
						</select><br><br>
					<label class="formField">Año: </label> <br>
                      	<select size="1" name="year">
                            <option value="2005">2005</option>
                            <option value="2006">2006</option>
                            <option value="2007">2007</option>
                            <option value="2008">2008</option>
                            <option value="2009">2009</option>
                            <option value="2010">2010</option>
                            <option value="2011">2011</option>
                            <option value="2012">2012</option>
                            <option value="2013">2013</option>
                      	</select><br><br>                       
					<label>Name:</label><br><input type="text" name="name" value="" size="40"><br><br>
               <!-- Upload Image -->	
                    <label>Imagen: </label><br>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000"> 
                        <input name="userfile" type="file">
                <!-- Upload Image --> 
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



