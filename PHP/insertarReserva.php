<?php	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();	
	
	$idPayment;
	$option=$_GET['option'];	
	$idPerson=$_GET['user'];
	$months=$_GET['months'];
	$date=date("Y-m-d");
		
	$query='INSERT INTO payment VALUES (\''.$idPayment.'\',\''.$idPerson.'\',\''.$months.'\',\''.$date.'\')';
	modifyDB($query);
	
	if ($option == "User")
		echo '<script language="javascript" type="text/javascript">window.location="/Pagos.php"</script>';
	else
		echo '<script language="javascript" type="text/javascript">window.location="/Admin/Pagos.php"</script>';
?>