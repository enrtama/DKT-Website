<?

function connect(){
	@ $db=mysql_pconnect('mysql.webcindario.com','drinkteam','q99koJrv***+++');
	if (!$db){ 
		echo '<br>Error: Connection failed. Try again later<br>';
	}
		mysql_select_db('drinkteam');
}

function modifyDB($query){
	$results=mysql_query($query);
	if (!empty($results)){
		?><script language="javascript" type="text/javascript">
			window.close();
		</script><?php
	}else{	
		?><script language="javascript" type="text/javascript">
			alert('It could not modify the database. Try again later');
			window.history.back();
		</script><?php
	}
}

function existingUser(){
	?><script language="javascript" type="text/javascript">
			alert('The user already exits');
			window.history.back()
	</script><?php
}

?>