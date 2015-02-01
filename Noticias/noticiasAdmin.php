<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Admin - Noticias</title>
    <link rel="stylesheet" type="text/css" href="../CSS/noticias.css"/>     
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
        	<button type="submit" class="buttonMenu" onClick="location.href='/Noticias/noticiasAdmin.php'">
            <img src="/Imagenes/Iconos/news.png" title="News" align="absmiddle"/> 
            Noticias</button><br>
            <button type="submit" class="buttonMenu" onClick="location.href='/Personal/Personal.php'">
            <img src="/Imagenes/Iconos/staff.png" title="Staff" align="absmiddle"/>
            Personal</button>
            <button type="submit" class="buttonMenu" onClick="location.href='/Admin/Pagos.php'">
            <img src="/Imagenes/Iconos/payment.png" title="Payment" align="absmiddle"/> 
            Pagos</button><br><br>
        </div>

	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div>
        <div id="textLayer">
<?php
                include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
                connect();
                $query='SELECT * FROM news ORDER BY dateNew DESC';
                $results=mysql_query($query);
                $numberResults=mysql_num_rows($results);
                
                for($i=0; $i<$numberResults; $i++){
                    $row=mysql_fetch_array($results);
					$idNew=$row['idNew'];
                    $title=$row['title'];
					$date=$row['dateNew'];
					$sport=$row['sportNew'];
                    $content=$row['content'];
                    $pathImage=$row['image'];	
					$date2=date("d-m-Y",strtotime($date));								
                    
                    echo '<table class="tableEditor">';
                    echo '<tr>';
					if (empty($pathImage))
						echo '<td class="img" rowspan="5"><img class="image1" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/noNew.png"></td>';		
					else
						echo '<td class="img" rowspan="5"><img class="image1" src="/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/'.$pathImage.'"></td>';
                    echo '</tr>';
					echo '<tr>';
                    echo '<td class="typeNew">[Noticia] - '.$sport.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="titleNew">'.$title.'</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="dateNew">'.$date2.'</td></tr>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td class="contentNew" >'.$content.'</td></tr>';
                    echo '</tr>';
                    echo '</table><br>';
					echo '<div class="iconNew">'."<a href=javascript:confirmModify('./modificarNoticia.php?idNew=".$idNew."&menu=Admin')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/modify.png\" title=\"Modify\" align=\"absmiddle\"> Modificar</button>".'</a>';
					echo "<a href=javascript:confirmDelete('../PHP/borrarElemento.php?table=news&primaryKey=idNew&value=".$idNew."&menu=Editor')>
					<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/delete.png\"title=\"Delete\" align=\"absmiddle\"> Borrar</button>".'</a>'.'</div><br>';					
				}
				echo "<a href=javascript:confirmInsert('./nuevaNoticia.php?menu=Admin')>
				<button class=\"buttonLogin\"><img class=\"image\" src=\"../Imagenes/Iconos/insert.png\"title=\"Insert\" align=\"absmiddle\"> Insertar</button>".'</a>';
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



