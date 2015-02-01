<?php
	session_start();
	if ($_SESSION['loggedUser'] != "ok" ){
	   // Redirect login page
	   header ("Location: /Usuario/loginUser.php");
	   exit;
	}
	$idNew = trim($_GET['idNew']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DKT - Pagos</title>
	<link href="/CSS/calendario.css" rel="stylesheet" type="text/css">    
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
				    	echo '<li id="botonMenuSeleccionado"> <a href="/Pagos.php"> Pagos </a> </li>';
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
        	<h2>Pagos</h2>
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
            	include($_SERVER['DOCUMENT_ROOT']."/PHP/apuntaPago.php");
				mostrarPagos("User");				
        	?>
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
