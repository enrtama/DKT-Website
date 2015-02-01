<?php session_start();?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Home - Peña DrinkTeam</title>
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
            	<li id="botonMenuSeleccionado"> <a href="/main.php"> DrinkTeam </a> </li>
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
        	<h2>Peña DrinkTeam</h2>
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
			<div id="principal">
				<?php 
                    include_once($_SERVER['DOCUMENT_ROOT']."/Noticias/mostrarNoticias.php");			
                    showLastNews();
                ?>		
            </div>
            <div id="principal">
<div><iframe width="310" height="275" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.es/maps/ms?msa=0&amp;msid=204427530892694669670.0004aa13895a8234116b1&amp;hl=es&amp;ie=UTF8&amp;t=h&amp;ll=41.582949,-4.712083&amp;spn=0.002408,0.003224&amp;z=18&amp;iwloc=0004aa1395d648e2bfa28&amp;output=embed"></iframe><br /><small><br><center>Ver <a href="http://maps.google.es/maps/ms?msa=0&amp;msid=204427530892694669670.0004aa13895a8234116b1&amp;hl=es&amp;ie=UTF8&amp;t=h&amp;ll=41.582949,-4.712083&amp;spn=0.002408,0.003224&amp;z=18&amp;iwloc=0004aa1395d648e2bfa28&amp;source=embed" target="_blank">Peña DKT</a> en un mapa más grande</center></small><br></div>
            <p class="history">Drink-Team es una peña que nace en 2005 fruto de la unión de varios grupos. En su segundo año de vida DKT, abreviatura que se comenzó a popularizar años después, se alzó con el trofeo de campeón de fútbol 11 en el torneo de peñas dejando clara la excelente cantera deportiva que había entre los miembros de la peña. Con los colores negro y naranja como bandera DKT pasó por diferentes sedes hasta situarse definitivamente en El Villar, al lado de la ermita de Laguna de Duero.</p>

			<p class="history">Con el paso de los años no son pocas las personas que han abandonado la peña, pero también otros muchos han sido incorporados como nuevos miembros. En la actualidad más de veinte personas procedentes de todos los barrios de Laguna forman la familia negrinaranja.</p><br>
            </div>
        </div>
        <!-- fin capa texto -->
        <?php 
			include_once($_SERVER['DOCUMENT_ROOT']."/Estructura/CapaPiePagina.html");
		?>
        <div id="contador">
			<script type="text/javascript" src="http://contadores.miarroba.es/ver.php?id=666693"></script>
        </div>
    </div>
    <!-- fin capa centro --> 
</div>
<!-- fin capa contenido -->

</body>
</html>
