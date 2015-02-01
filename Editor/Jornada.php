<?php
	include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");
	$sport=$_GET['sport'];
	$championship=$_GET['championship'];	
	if (empty($championship))
		$championship=1;
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Jornada</title>
    <script type="text/javascript" src="../JavaScript/generalFunctions.js"></script>
	<script type="text/javascript" src="../JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="../JavaScript/JQuery/js/jquery-ui-1.8.21.custom.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../JavaScript/JQuery/css/smoothness/jquery-ui-1.8.21.custom.css"/>    
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?>
    
    <script type="text/javascript">

		$(document).ready(function() {
			$( "#datepicker" ).datepicker({
				changeMonth: true,
				changeYear: true,
				showOn: "button",
				buttonImage: "/Imagenes/Iconos/calendar.png",
				buttonImageOnly: true,
				yearRange: '2000:2013',
				dateFormat: 'dd/mm/yy'
			});
		});
		
		function loadXMLDoc(value){
			if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
			  xmlhttp=new XMLHttpRequest();
			  }
			else{// code for IE6, IE5
			  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			  }
			xmlhttp.onreadystatechange=function(){
			  if (xmlhttp.readyState==4 && xmlhttp.status==200){
				document.getElementById("contentLayer").innerHTML=xmlhttp.responseText;
				$( "#datepicker" ).datepicker({
					changeMonth: true,
					changeYear: true,
					showOn: "button",
					buttonImage: "/Imagenes/Iconos/calendar.png",
					buttonImageOnly: true,
					yearRange: '2000:2013',
					dateFormat: 'dd/mm/yy'
				});
				}
			  }
			xmlhttp.open("GET","Jornada.php?championship="+value,true);
			xmlhttp.send();
		}
		
	</script>
    
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
				<form id="formLayer" name="formModifyNew" action="/PHP/insertarJornada.php" onReset="return confirmReset()" method="post">
					<fieldset id="personalData">
					<legend>Sport Day Information</legend><br>
                    <?php
                        include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
                        connect(); 
                        $query='SELECT nameChampionship FROM championship';
                        $results=mysql_query($query);
                        $numberResults=mysql_num_rows($results); 
                        for($i=0; $i<$numberResults; $i++){
                            $row=mysql_fetch_array($results);
                            $championships[$i]=$row['nameChampionship'];
                        }
                    ?>
                    <label>Campeonato: </label><br>
						<select name="championship" onchange='loadXMLDoc(this.value)' style="width:155px;">                    
                        <?php
							for($i=0; $i<$numberResults; $i++){
								if (($i+1) == $championship)
									echo '<option selected value="'.($i+1).'">'.$championships[$i].'</option>';								
								else
									echo '<option value="'.($i+1).'">'.$championships[$i].'</option>';
							}
                        ?>
                   		</select><br><br>
                    <label>Jornada: </label><br>						
                    	<select name="sportDay">                    
							<option value="1">1</option>
 							<option value="2">2</option>
                            <option value="3">3</option>
							<option value="4">4</option>
 							<option value="5">5</option>
                            <option value="6">6</option>   
							<option value="7">7</option>
 							<option value="8">8</option>
                            <option value="9">9</option>   
                           	<option value="10">10</option>
 							<option value="11">11</option>
                            <option value="12">12</option>   
                            <option value="13">13</option>
 							<option value="14">14</option>
                            <option value="15">15</option>   
                            <option value="16">16</option>
 							<option value="17">17</option>
                            <option value="18">18</option>
 							<option value="19">19</option>
                            <option value="20">20</option>                                                       
                   		</select><br><br>
                    <label>Fecha: </label><br><input name="datepicker" id="datepicker" size="10"/><br><br>
                    <label>Lugar: </label><br><input type="text" name="place" size="30"/><br><br>    
					<?php
					
                        $query='SELECT nameTeam FROM team WHERE idChampionship=\''.$championship.'\'';
                        $results=mysql_query($query);
                        $numberResults=mysql_num_rows($results);  
                        for($i=0; $i<$numberResults; $i++){
                            $row=mysql_fetch_array($results);
                            $teams[$i]=$row['nameTeam'];
                        }
                    ?>
                    <label>Equipo1/Goles - Equipo2/Goles: </label><br>
                        <?php
							echo '<select name="equipo1">';
							for($i=0; $i<$numberResults; $i++){
									echo '<option value="'.$teams[$i].'">'.$teams[$i].'</option>';
							}
							echo '</select>';	
                        ?>
					<input type="text" name="goles1" value="" size="2" maxlength="2">
                    <label> - </label>                   
                    <input type="text" name="goles2" value="" size="2" maxlength="2">
                        <?php
							echo '<select name="equipo2">';
							for($i=0; $i<$numberResults; $i++){
									echo '<option value="'.$teams[$i].'">'.$teams[$i].'</option>';
							}
							echo '</select>';	
                        ?>    
                        <br><br>
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



