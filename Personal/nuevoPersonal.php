<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>   

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin - Personal</title>
	<script type="text/javascript" src="../Javascript/generalFunctions.js"></script>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?>
</head>

<body>

<div id="contentLayer">      
    
    <div id="centerLayer">
        <div id="title">
        	<header1>Administrator</header1>
        </div>
        
        <div id="leftLayer">
            <div id="menuLayer">
        	<button type="submit" class="buttonMenu" onClick="location.href='../Noticias/noticiasAdmin.php'">
            <img src="/Imagenes/Iconos/news.png" title="News" align="absmiddle"/> 
            News</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='./personal.php'">
            <img src="/Imagenes/Iconos/staff.png" title="Staff" align="absmiddle"/>
            Staff</button>
            <button type="submit" class="buttonMenu" onClick="location.href='../Admin/Pagos.php'">
            <img src="/Imagenes/Iconos/payment.png" title="Payment" align="absmiddle"/> 
            Payment</button><br><br>
            </div>
        </div>
    
   	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div> 
        <div id="textLayer">
            <form id="formLayer" name="formInsertStaff" action="./insertarPersonal.php" onReset="return confirmReset()" method="post">
                <fieldset id="personalData">
                <legend>Staff Information</legend>
                <br><label>User:</label><br><input type="text" name="user" value="" 
                size="20"><br><br>
                <label>Password:</label><br><input type="password" name="password" value="" 
                size="20"><br><br>
                <label class="formField">User Type: </label><br>
                    <select size="1" style="width:145px" name="userType">
                        <option value="1">Administrador</option>
                        <option value="2">Designer</option>
                    </select><br><br>	  
            </fieldset><br><br>
                <button type="submit" class="buttonLogin"><img src="../Imagenes/Iconos/accept.png" title="Insert" align="absmiddle"/> Insert</button>
                <button type="reset" class="buttonLogin"><img src="../Imagenes/Iconos/clear.png" title="Clear" align="absmiddle"/> Clear</button>
            </form>
        </div>
        <!-- fin capa texto -->
    </div>
    <!-- fin capa centro -->
    
</div>
<!-- fin capa contenido -->

</body>
</html>