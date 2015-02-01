<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Peña DrinkTeam</title>
    <?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/Head.html");?>
    <link href="/CSS/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="/JavaScript/JQuery/css/smoothness/jquery-ui-1.8.21.custom.css"/>        
    <script type="text/javascript" src="/JavaScript/generalFunctions.js"></script>
	<script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-ui-1.8.21.custom.min.js"></script>
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
        	<h2>Peña DrinkTeam</h2>
        </div>
        <!--fin capa titulo -->
        
        <div id="capaTexto">
            <div id="loginLayer">
                <div class="ui-widget">
                    <div class="ui-state-error ui-corner-all" style="width:505px; margin:20px;">
                        <p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
                        <strong>Error:</strong> User error</p>
                    </div>
                </div>            
                <div id="formLogin">
                <fieldset id="loginData">
                      <form name="accessAdministration" action="../PHP/comprobarUser.php" method="post">
                          <table id="tableLogin">
                              <tr>
                                  <td><label for="userMail">Email:</label></td>
                                  <td><input id="userMail" name="userMail" class="login"/></td>
                              </tr>
                              <tr>
                                  <td><label for="password">Password:</label></td>
                                  <td><input type="password" id="password" name="password" class="login"/></td>
                              </tr>
                          </table>
                          <br>
                          <div id="buttonLayer">
                              <button type="submit" class="buttonLogin"><img src="/Imagenes/Iconos/lock.png" title="Login" align="absmiddle"/> 
                              Access</button>
                              <button type="reset" class="buttonLogin"><img src="/Imagenes/Iconos/clear.png" title="Login" align="absmiddle"/> 
                              Clear</button>
                          </div>
                      </form>
                </fieldset>            
                </div>
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
