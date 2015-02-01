<?php session_start();?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Peña DrinkTeam</title>
    <?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/Head.html");?>
</head>

<body>
<div id="capaContenido">
	<div id="capaIzquierda">
    
    	<div id="Logo">
        	<?php include($_SERVER['DOCUMENT_ROOT']."/Estructura/CapaLogo.html");?>
        </div>
                
        <div id="capaMenu">
   	  		<ul id="listaMenu">
            	<li class="botonMenu"> <a href="/main.php"> DrinkTeam </a> </li>
                <li class="botonMenu"> <a href="/Registrarse.php"> Registrarse </a> </li>
                <li class="botonMenu"> <a href="/Fotos.php"> Fotos </a> </li>
                <li class="botonMenu"> <a href="/Videos.php"> Videos </a> </li>
                <li class="botonMenu"> <a href="/Noticias.php"> Noticias </a> </li>
                <li class="botonMenu"> <a href="/Campeonatos.php"> Campeonatos </a> </li>
                <?php
					if (isset($_SESSION["sessionUser"])){
				    	echo '<li class="botonMenu"> <a href="/Pagos.php"> Pagos </a> </li>';
				    	echo '<li class="botonMenu"> <a href="/Integrantes.php"> Integrantes </a> </li>';
					}
				?>
             </ul>
            <!--fin lista menu -->
        </div>
        <!-- fin capa menu -->

    </div>
    <!-- fin capa izquierda -->
    
    <div id="capaCentro">
    	<div id="capaTitulo">
        	<h2>Contacto</h2>
            <?php
				if ($_SESSION['loggedUser'] != "ok")					
					echo '<div class="session"><a href="/Usuario/loginUser.php"><img class="imageSession" src="/Imagenes/Iconos/session.png" 
					alt="session" title="Iniciar sesión" onmouseover="this.src=\'/Imagenes/Iconos/session2.png\'"
					onmouseout="this.src=\'/Imagenes/Iconos/session.png\'" border="0px"></a></div>';
				else
					echo '<div class="session"><a href="/logout.php">logout </a>'; echo $_SESSION["sessionUser"];'</div>';
			?> 
        </div>
        <!--fin capa titulo -->
        
        <div id="capaTexto">
            <br><p class="tituloTexto">Web Master:</p>
            <p><a href="mailto:enrique.tamames@gmail.com"><img src="Imagenes/Iconos/contact.png" 
            alt="enrique.tamames@gmail.com" onmouseover="this.src='Imagenes/Iconos/contact2.png'"
        	onmouseout="this.src='Imagenes/Iconos/contact.png'" border="0px"/></a></p>
            
            <p class="estudios">Ingeniero Técnico en Informática de Sistemas</p>
            <p class="estudios">Estudiante Graduado en Informática de Sistemas</p>
            
            <p class="tituloTexto">Contacto:</p>
            <a href="https://twitter.com/enrtama" target="_blank"><img class="linkTwitter" src="Imagenes/SocialNetworks/twitter.png" 
            title="go to twitter" alt="twitter" onmouseover="this.src='Imagenes/SocialNetworks/twitter2.png'"
            onmouseout="this.src='Imagenes/SocialNetworks/twitter.png'" border="0px"/></a>
            <a href="http://www.facebook.com/enrique.tamames" target="_blank"><img class="linkFacebook" src="Imagenes/SocialNetworks/facebook.png" 
            title="go to facebook" alt="facebook" onmouseover="this.src='Imagenes/SocialNetworks/facebook2.png'"
            onmouseout="this.src='Imagenes/SocialNetworks/facebook.png'" border="0px"/></a>
            <a href="http://es.linkedin.com/pub/enrique-tamames/39/389/885" target="_blank"><img class="linkLinkedin" src="Imagenes/SocialNetworks/linkedin.png" 
            title="go to linkedin" alt="linkedin" onmouseover="this.src='Imagenes/SocialNetworks/linkedin2.png'"
            onmouseout="this.src='Imagenes/SocialNetworks/linkedin.png'" border="0px"/></a>
            <br><br><br>
            <form name="formularioContacto" action="mailto:enrique.tamames@gmail.com?subject=Contacto%20DrinkTeam" onReset="return confirm('Delete  data?')" method="post" enctype="text/plain">
                <fieldset id="capaDatosPersonales">
                    <legend>Formulario de Contacto</legend></br>
                    <label>Nombre:<br><input type="text" id="nombre" name="nombre" value="" size="20" maxlength="20"></label><br>
                    <label>Apellidos:<br><input type="text" id="apellidos" name="apellidos"size="40" maxlength="40"></label><br>
                    <label>Correo electronico:<br><input type="text" id="email" name="email" size="40"></label><br>
                    <label>Mensaje:<br><textarea name="mensaje" id="mensaje" rows="10" cols="40" wrap="soft"></textarea></label><br><br>
                    <button type="submit" class="sendButton">Enviar</button>
                    <button type="reset" class="resetButton">Borrar</button>
                </fieldset>
            </form> 
        </div>
        <!-- fin capa texto -->
        
        <div id="capaPiePagina">
			<?php include($_SERVER['DOCUMENT_ROOT']."/Estructura/CapaPiePagina.html");?>
        </div>
    </div>
    
    </div>
    <!-- fin capa centro --> 
</div>
<!-- fin capa contenido -->

</body>
</html>
