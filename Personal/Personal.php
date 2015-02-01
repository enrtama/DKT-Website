<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>   

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin - Personal</title>
    <script type="text/javascript" src="../JavaScript/generalFunctions.js"></script>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?>
</head>

<body>

<div id="contentLayer">      
    
    <div id="centerLayer">
    
        <div id="title">
        	<header1>Administrator</header1>
        </div>
        
        <div id="menuLayer">
        	<button type="submit" class="buttonMenu" onClick="location.href='../Noticias/noticiasAdmin.php'">
            <img src="/Imagenes/Iconos/news.png" title="News" align="absmiddle"/> 
            Noticias</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./Personal.php'">
            <img src="/Imagenes/Iconos/staff.png" title="Staff" align="absmiddle"/>
            Personal</button>
            <button type="submit" class="buttonMenu" onClick="location.href='../Admin/Pagos.php'">
            <img src="/Imagenes/Iconos/payment.png" title="Payment" align="absmiddle"/> 
            Pagos</button><br><br>
        </div>

	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div>
        <div id="textLayer">
<?php
				include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
                connect();
				$query='SELECT * FROM staff';
				$results=mysql_query($query);
				$numberResults=mysql_num_rows($results);
				
				for($i=0; $i<$numberResults; $i++){
					$row=mysql_fetch_array($results);
					$user=$row['user'];
					$password=$row['password'];
					$userType=$row['userType'];
					
					echo '<table class="tableEditor">';
					echo '<tr class="userName"><td>User: '.$user.'</td></tr>';
					echo '<tr class="password"><td>Password: *****</td></tr>';
					echo '<tr class="userType" ><td>['.$userType.']</td></tr>';
					echo '</table>';
					echo '<div class="iconNew">'."<a href=javascript:confirmModify('./modificarPersonal.php?user=".$user."')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/modify.png\" title=\"Modify\" align=\"absmiddle\"> Modify</button>".'</a>';
					echo "<a href=javascript:confirmDelete('../PHP/borrarElemento.php?table=staff&primaryKey=user&value=".$user."&menu=Admin')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/delete.png\"title=\"Delete\" align=\"absmiddle\"> Delete</button>".'</a>'.'</div><br>';										
				}
				echo "<a href=javascript:confirmInsert('./nuevoPersonal.php')>
				<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/insert.png\"title=\"Insert\" align=\"absmiddle\"> Insert</button>".'</a>';	
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



