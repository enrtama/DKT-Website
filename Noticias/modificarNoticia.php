<?php include ($_SERVER['DOCUMENT_ROOT']."/PHP/startAdminSession.php");?>

<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Editor - Noticias</title>
    <link rel="stylesheet" type="text/css" href="/JavaScript/JQuery/css/smoothness/jquery-ui-1.8.21.custom.css"/>
    <link rel="stylesheet" type="text/css" href="/CSS/noticias.css"/>      
	<script type="text/javascript" src="/JavaScript/generalFunctions.js"></script>
	<script type="text/javascript" src="/JavaScript/JQuery/js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="/JavaScript/JQuery/js/jquery-ui-1.8.21.custom.min.js"></script>
	<?php include ($_SERVER['DOCUMENT_ROOT']."/Estructura/headAdmin.html");?>
    
    <script>
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
	</script>
    
    <!-- TinyMCE -->
    <script type="text/javascript" src="../tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
    <script type="text/javascript">
        tinyMCE.init({
            // General options
            mode : "textareas",
            theme : "advanced",
            plugins : "imagemanager,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
    
            // Theme options
            theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
            theme_advanced_toolbar_location : "top",
            theme_advanced_toolbar_align : "left",
            theme_advanced_statusbar_location : "bottom",
            theme_advanced_resizing : true,
    
            // Example content CSS (should be your site CSS)
            content_css : "css/content.css",
    
            // Drop lists for link/image/media/template dialogs
            template_external_list_url : "lists/template_list.js",
            external_link_list_url : "lists/link_list.js",
            external_image_list_url : "lists/image_list.js",
            media_external_list_url : "lists/media_list.js",
    
            // Style formats
            style_formats : [
                {title : 'Bold text', inline : 'b'},
                {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
                {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
                {title : 'Example 1', inline : 'span', classes : 'example1'},
                {title : 'Example 2', inline : 'span', classes : 'example2'},
                {title : 'Table styles'},
                {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
            ],
    
            // Replace values for the template plugin
            template_replace_values : {
                username : "Some User",
                staffid : "991234"
            }
        });
    </script>
    <!-- /TinyMCE -->

</head>

<body>

<div id="contentLayer">      
    
    <div id="centerLayer">
    
        <div id="title">        
		<?php
			if ($_GET['menu'] == "Admin")
        		echo '<header1>Administrator</header1>';
			else
				echo '<header1>Editor</header1>';
        ?>
		</div>
        <?php
			if ($_GET['menu'] == "Admin"){
				echo "<div id=\"menuLayer\">
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Noticias/noticiasAdmin.php'\">
					<img src=\"/Imagenes/Iconos/news.png\" title=\"News\" align=\"absmiddle\"/> 
					Noticias</button><br>
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Personal.php'\">
					<img src=\"/Imagenes/Iconos/staff.png\" title=\"Staff\" align=\"absmiddle\"/>
					Personal</button>
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Admin/Pagos.php'\">
					<img src=\"/Imagenes/Iconos/payment.png\" title=\"Payment\" align=\"absmiddle\"/> 
					Pagos</button><br><br>
				</div>";
			}else{
				echo "<div id=\"menuLayer\">
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Noticias/noticiasEditor.php'\">
					<img src=\"/Imagenes/Iconos/news.png\" title=\"News\" align=\"absmiddle\"/> 
					Noticias</button><br>
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Editor/Jornada.php'\">
					<img src=\"/Imagenes/Iconos/classification.png\" title=\"Sport Day\" align=\"absmiddle\"/> 
					Jornada</button><br>
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Editor/Trofeos.php'\">
					<img src=\"/Imagenes/Iconos/prizes.png\" title=\"Prizes\" align=\"absmiddle\"/> 
					Trofeos</button>
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Editor/Jugadores.php'\">
					<img src=\"/Imagenes/Iconos/team.png\" title=\"Players\" align=\"absmiddle\"/> 
					Jugadores</button><br>					
					<button type=\"submit\" class=\"buttonMenu\" onClick=\"location.href='/Editor/subirImagen.php'\">
					<img src=\"/Imagenes/Iconos/image.png\" title=\"Images\" align=\"absmiddle\"/> 
					Fotos</button><br><br><br>
				</div>";
			}
		?>
	    <div class="session"><a href="../logout.php">logout </a><?php echo $_SESSION["sessionAdmin"];?></div>
        <div id="textLayer">
        	<?php
				include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");				
                connect();
				$query='SELECT * FROM news WHERE idNew="'.$_GET['idNew'].'"';
				$results=mysql_query($query);
				$row=mysql_fetch_array($results);
				$sportNew=$row['sportNew'];
				$date = addslashes( substr($row['dateNew'],8,2) .'/'.substr($row['dateNew'],5,2) .'/'. substr($row['dateNew'],0,4) );
				$pathImage = "/tinymce/jscripts/tiny_mce/plugins/imagemanager/files/Noticias/".$row['image'];
				
				echo '
				<form id="formLayer" name="formModifyNew" action="./actualizarNoticia.php?idNew='.$_GET['idNew'].'&menu='.$_GET['menu'].'" onReset="return confirmReset()" method="post">
					<fieldset id="personalData">
					<legend>News Information</legend>
                    <label>Sport: </label><br>';
						if ($sportNew=="Futbol"){
				echo'		<select name="sport">
								<option value="1" selected>Futbol</option>
								<option value="2">Futbol Sala</option>
								<option value="3">Baloncesto</option>
								<option value="4">General</option>
							</select><br><br>';
						}if ($sportNew=="Futbol Sala"){	
				echo'		<select name="sport">
								<option value="1">Futbol</option>
								<option value="2" selected>Futbol Sala</option>
								<option value="3">Baloncesto</option>
								<option value="4">General</option>
							</select><br><br>';							
						}if ($sportNew=="Baloncesto"){	
				echo'		<select name="sport">
								<option value="1">Futbol</option>
								<option value="2">Futbol Sala</option>
								<option value="3" selected>Baloncesto</option>
								<option value="4">General</option>
							</select><br><br>';	
						}if ($sportNew=="General"){
				echo'		<select name="sport">
								<option value="1">Futbol</option>
								<option value="2">Futbol Sala</option>
								<option value="3">Baloncesto</option>
								<option value="4" selected>General</option>
							</select><br><br>';								
						}
			echo'		<label>Title:</label><br><input type="text" name="title" value="'.stripslashes($row['title']).'" size="70"><br><br>
					<label>Date: </label><br><input name="datepicker" id="datepicker" value="'.$date.'" size="10"/><br><br>
					<label>Time:</label><br><input type="text" name="time" value="'.stripslashes($row['timeNew']).'"size="10" maxlength="5"><br><br>
					<label>Content:<br>(Load Image first)</label><br><textarea id="elm1" name="elm1" rows="15" cols="80" style="width: 400px" type="textarea" name="content" rows="6" cols="40" wrap="soft"><img src="'.$pathImage.'">'.$row['content'].'</textarea><br><br>
					<button type="submit" class="buttonLogin"><img src="../Imagenes/Iconos/accept.png" title="Modify" align="absmiddle"/> Modify</button>
					<button type="reset" class="buttonLogin"><img src="../Imagenes/Iconos/clear.png" title="Clear" align="absmiddle"/> Clear</button>
				</form> ';
			?>
		</div>
    
    </div>
    <!-- fin capa centro -->

</div>
<!-- fin capa contenido -->

</body>
</html>



