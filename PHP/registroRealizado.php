<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>DKT - Registro</title>
	<script type="text/javascript" src="/JavaScript/Registro.js"></script>
   	<script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-ui-1.8.21.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/JavaScript/JQuery/css/smoothness/jquery-ui-1.8.21.custom.css"/>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/Head.html");?>
    
    <script type="text/javascript">
		$(document).ready(function() {
		   $("#datepicker").datepicker();
		});
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
            	<li class="botonMenu"> <a href="main.php"> DrinkTeam </a> </li>
                <li id="botonMenuSeleccionado"> <a href="Registrarse.php"> Registrarse </a> </li>
                <li class="botonMenu"> <a href="Fotos.php"> Fotos </a> </li>
                <li class="botonMenu"> <a href="Videos.php"> Videos </a> </li>
                <li class="botonMenu"> <a href="Noticias.php"> Noticias </a> </li>
                <li class="botonMenu"> <a href="Deportes/Deportes.php"> Deportes </a> </li>
                <li class="botonMenu"> <a href="Campeonatos.php"> Campeonatos </a> </li>
                <?php
					if (isset($_SESSION["sessionUser"]))
				    	echo '<li class="botonMenu"> <a href="Pagos.php"> Pagos </a> </li>';	
				?>
            </ul>
            <!--fin lista menu -->
        
        </div>
        <!-- fin capa menu -->

    </div>
    <!-- fin capa izquierda -->
    
    <div id="capaCentro">
    	<div id="capaTitulo">
        	<h2>Registrarse</h2>
            <?php
				if ($_SESSION['loggedUser'] != "ok")					
					echo '<div class="session"><a href="/Usuario/loginUser.php"><img class="imageSession" src="/Imagenes/Iconos/session.png" 
					alt="session" title="Iniciar sesión" onmouseover="this.src=\'/Imagenes/Iconos/session2.png\'"
					onmouseout="this.src=\'/Imagenes/Iconos/session.png\'" border="0px"></a></div>';
				else
					echo '<div class="session"><a href="logout.php">logout </a>'; echo $_SESSION["sessionUser"];'</div>';
			?> 
        </div>
        <!--fin capa titulo -->
        
        <div id="capaTexto">
        	<div class="ui-widget">
                <div class="ui-state-highlight ui-corner-all" style="margin-top: 20px; padding: 0 .7em;">
                    <p style="color:#00FF00;"><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>
                    <strong>Success!</strong> User registered.</p>
                </div>
			</div><br>
      	      <p class="infoForm">Complete el formulario con sus datos personales</p><br>
        	  	<form method="post" action="./Usuario/insertaUsuario.php" name="register" onSubmit="return validar_formulario(register)" onReset="return resetear()">
            	<br><fieldset id="capaDatosPersonales">
                	<legend> Datos Personales </legend>
                    <br><label>DNI: </label> <br> 
                    	<input type="text" name="dni" value="" maxlength="9"> <br>
                    <label>Nombre: </label> <br>
                    	<input type="text" name="userName" value="" maxlength="20"> <br>
                    <label>Apellidos: </label> <br>
                    	<input type="text" name="userSurname" value="" maxlength="40" size="30"> <br>
                    <label>Password: </label> <br>
                    	<input type="password" name="password" value="" maxlength="8" onKeyUp="actualizar_nivel_contrasena(this.value, nivelContrasena)"> 
                        <input type="text" name="nivelContrasena" value="" id="nivelContrasena" readonly="readonly"> <br>  
                    <label>Repetir Password: </label> <br>
                    	<input type="password" name="repassword" value="" maxlength="8"> <br>
                    <label>Fecha Nacimiento: </label><br><input type="text" name="datepicker" id="datepicker" readonly size="20"/><br><br>
                </fieldset>
                <fieldset id="capaDatosLocalizacion">
                	<legend> Datos de Localización </legend>
                  	<label>Direccion: </label> <br>
                    	<input type="text" name="address" value="" maxlength="9" size="50"><br>                    
                    <label>Telefono: </label> <br>
                    	<input type="text" name="phone" value="" maxlength="9" onBlur="telefono_valido(this.value)"><br>
                    <label>Correo Electronico: </label> <br>
                    	<input type="text" name="mail" value="" maxlength="200" size="50" onBlur="correo_valido(this.value)"><br><br>
                </fieldset>
                <fieldset id="capaDatosDeportivos">
                <legend> Datos Deportivos </legend>
                   <label>Deporte: </label><br>
						<select name="sport">
							<option value="1">Futbol</option>
							<option value="2">Futbol Sala</option>
							<option value="3">Baloncesto</option>
						</select><br><br>
                <!-- Upload Image -->	
                    <label>Imagen: </label><br>    
                        <input type="hidden" name="MAX_FILE_SIZE" value="5000000"> 
                        <input name="userfile" type="file"><br>
                <!-- Upload Image -->   
                </fieldset>
                <input type="submit" class="sendButton" value="Aceptar"/>
                <input type="reset" class="resetButton" value="Reiniciar" />
	  		  	</form></p>
        </div>
        <!-- fin capa texto -->
        
        <div id="capaPiePagina">
			<?php include($_SERVER['DOCUMENT_ROOT']."/Estructura/CapaPiePagina.php");?>
        </div>
    </div>
    
    </div>
    <!-- fin capa centro --> 
</div>
<!-- fin capa contenido -->

</body>
</html>
