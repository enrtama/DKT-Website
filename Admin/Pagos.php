<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin - Pagos</title>
	<link href="/CSS/calendario.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="/JavaScript/generalFunctions.js"></script>    
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
            <button type="submit" class="buttonMenu" onClick="location.href='../Personal/Personal.php'">
            <img src="/Imagenes/Iconos/staff.png" title="Staff" align="absmiddle"/>
            Personal</button>
            <button type="submit" class="buttonMenu" onClick="location.href='./Pagos.php'">
            <img src="/Imagenes/Iconos/payment.png" title="Payment" align="absmiddle"/> 
            Pagos</button><br><br>
        </div>

	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div>
        <div id="textLayer">
			<?php 
            	include($_SERVER['DOCUMENT_ROOT']."/PHP/apuntaPago.php");
				mostrarPagos("Admin");
        	?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



