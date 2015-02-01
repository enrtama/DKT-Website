<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Login</title>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?> 
    <link href="/CSS/login.css" rel="stylesheet" type="text/css">   
</head>

<body>    

<div id="loginLayer"> 
    <div class="session"><a href="./main.php">home</a></div> 
    <div id="formLogin">
        <fieldset id="loginData">
              <form name="accessAdministration" action="./PHP/comprobarPersonal.php" method="post">
                  <table id="tableLogin">
                      <tr>
                          <td><label for="userType">User Type:</label></td>
                          <td><select size="1" name="userType" class="loginUser">
                                  <option value="1">Administrator</option>
                                  <option value="2">Editor</option>
                              </select></td>
                      </tr>
                      <tr>
                          <td><label for="userName">Username:</label></td>
                          <td><input id="userName" name="userName" class="login"/></td>
                      </tr>
                      <tr>
                          <td><label for="password">Password:</label></td>
                          <td><input type="password" id="password" name="password" class="login"/></td>
                      </tr>
                  </table>
                  <br>
                  <div id="buttonLayer">
                      <button type="submit" class="buttonLogin"><img src="Imagenes/Iconos/lock.png" title="Login" align="absmiddle"/> 
                      Access</button>
                      <button type="reset" class="buttonLogin"><img src="Imagenes/Iconos/clear.png" title="Login" align="absmiddle"/> 
                      Clear</button>
                  </div>
              </form>
        </fieldset>
        <br><br>
    </div>
    <!-- fin capa texto -->
</div>
<!-- fin capa centro -->

</body>
</html>



