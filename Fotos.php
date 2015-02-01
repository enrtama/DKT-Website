<?php session_start();?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DKT - Fotos</title>
	<link rel="stylesheet" href="/CSS/LightBox/lightbox.css" type="text/css" media="screen"/>     
	<script type="text/javascript" src="/JavaScript/LightBox/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/LightBox/jquery-ui-1.8.18.custom.min.js"></script>
    <script type="text/javascript" src="/JavaScript/LightBox/lightbox.js"></script>        
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
                <li id="botonMenuSeleccionado"> <a href="/Fotos.php"> Fotos </a> </li>
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
        	<h2>Fotos</h2>
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
            <?php
                include_once($_SERVER['DOCUMENT_ROOT']."/PHP/mostrarImagenes.php");
            	showImages();
            ?><br><br><br>
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
