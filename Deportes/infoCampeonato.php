<?php
	session_start();
	$year = trim($_GET['year']);
	if (empty($year)){
		$year=date("Y")+1;
	}
	$idTeam = trim($_GET['idTeam']);	
	$idChampionship = trim($_GET['idChampionship']);	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Peña DrinkTeam - Campeonatos</title>
	<link rel="stylesheet" href="/CSS/LightBox/lightbox.css" type="text/css" media="screen"/>          
    <link rel="stylesheet" type="text/css" href="/JavaScript/JQuery/css/smoothness/jquery-ui-1.8.21.custom.css"/>    
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-ui-1.8.21.custom.min.js"></script>
	<script type="text/javascript" src="/JavaScript/LightBox/jquery.smooth-scroll.min.js"></script>
    <script type="text/javascript" src="/JavaScript/LightBox/lightbox.js"></script>
    <script type="text/javascript" src="/JavaScript/prototype.js"></script> 
	<script type="text/javascript" src="/JavaScript/jquery.cycle.all.js"></script>
	<script type="text/javascript" src="/JavaScript/jquery.js"></script>           
    <?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/Head.html");?>
    
	<script type="text/javascript">
		
		var jQ = jQuery.noConflict();
		jQ(document).ready(function() {
			jQ('.patrocinadores').cycle({
				fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
			});
		});
		
		function getPlayer(id,id2) {
			var option = {
				method: 'post',
				parameters: {
					id: id,
					idChampionship:id2
				}
			}
			new Ajax.Updater('datosJugadores','/PHP/getPlayer.php',option);
		}
		
		function getMatches(id) {
			var option = {
				method: 'post',
				parameters: {
					id:id
				}
			}
			new Ajax.Updater('datosEquipo','/PHP/getMatches.php',option);
		}
		
		window.onload = function() {
			getMatches(<?php print($idChampionship) ?>);
		}  
		
	</script>
    
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
                <li id="botonMenuSeleccionado"> <a href="/Campeonatos.php"> Campeonatos </a> </li>
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
        	<h2>Campeonatos</h2>
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
            <?php include_once($_SERVER['DOCUMENT_ROOT']."/PHP/mostrarCampeonatos.php"); ?>
        	<div class="temporada">
				Temporada <a href="javascript:window.location='/Campeonatos.php?year=2012'"> 11/12 </a> - 
                		  <a href="javascript:window.location='/Campeonatos.php?year=2013'"> 12/13 </a>
            </div>
        	<div class="temporada">
				<a href="javascript:window.location='/Deportes/infoJornada.php?idTeam=<?php echo $idTeam; ?>&idChampionship=<?php echo $idChampionship; ?>'"> Ver Calendario </a>
            </div>            
            <div class="blog">
				<a href="http://dktfutbolsala.wordpress.com" target="_blank">- Blog DKT -</a> 
            </div>
            <div id="datosEquipo">
                <p class="loading"><img src="/Imagenes/ajax-loader.gif" alt="Loading"/></p>
            </div>  
			<div id="infoTeam"><br>
                <?php
					showExpandedTeam($idChampionship,$idTeam);
					echo '<div id="datosJugadores"></div>';					
				?>
        	</div>
			<?php include($_SERVER['DOCUMENT_ROOT']."/Estructura/CapaPatrocinadores.html");?>
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
