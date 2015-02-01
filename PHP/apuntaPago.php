<?php

function mostrarPagos($option){

	  $year = date('Y');
	  $mesesPago=Array(1=>"Ene-Feb","Mar-Abr","May-Jun",
	  						"Jul-Ago","Sep-Oct",
							"Nov-Dic");
	  
	/* ****************************
		 PAGOS
	 ****************************** */  
	 
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/interactionDB.php");
	connect();
	$query='SELECT DNI,userName FROM usergroup';
	$resultados=mysql_query($query);
	$num_resultados=mysql_num_rows($resultados);

	for($i=0; $i<$num_resultados; $i++){
		$row=mysql_fetch_array($resultados);
		$dniUser[$i]= $row['DNI'];
		$namesUser[$i]= $row['userName'];
	}
		
	$query2='SELECT * FROM payment,usergroup
			WHERE (usergroup.DNI = payment.idPerson)';
	$resultados2=mysql_query($query2);
	$num_resultados2=mysql_num_rows($resultados2);

	for($i=0; $i<$num_resultados2; $i++){
		$row=mysql_fetch_array($resultados2);
		$datosMes[$i]=$row['months'];
		$datosUser[$i]=$row['userName'];
	}
				
	echo "<table id=\"reservaPago\">";
	echo "<tr class=\"tituloPago\"><td colspan=7></td></tr>";
	echo "<tr><td class=\"year\">Year ".$year."</td>";

	for($i=1; $i<6+1; $i++){
		echo "<td class=\"mes\">".$mesesPago[$i]."</td>";	
	}		
	
	for ($i=0;$i <= $num_resultados-1;$i++){
		echo "<tr><td class=\"pago\">".$namesUser[$i]."</td>";	
		imprimirPagos($datosMes,$dniUser,$mesesPago,$i,$option);
	}
	echo "</tr></table>";
	
	include_once($_SERVER['DOCUMENT_ROOT']."/PHP/mostrarComentarios.php");
	if ($option == "User")
		showComments("payments");
}

function imprimirPagos($meses,$dniUsers,$mesComparar,$index1,$option){
	
	$query='SELECT months FROM payment
			WHERE (idPerson =\''.$dniUsers[$index1].'\')';
	$resultados=mysql_query($query);
	$num_resultados=mysql_num_rows($resultados);
	
	for($i=0; $i<$num_resultados; $i++){
		$row=mysql_fetch_array($resultados);
		$auxmeses[$i]=$row['months'];
	}
	
	for ($k=0; $k<6; $k++){
		if ($auxmeses[0] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else if ($auxmeses[1] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else if ($auxmeses[2] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else if ($auxmeses[3] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else if ($auxmeses[4] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else if ($auxmeses[5] == $mesComparar[$k+1])
			echo "<td class=\"pagado\">".'Pagado'."</td>";
		else{
			if ($option == "User")	
				echo "<td class=\"noPagado\">".'Pagar'."</td>";
			else
				echo "<td class=\"noPagado\">"."<a href=javascript:confirmReserve('/PHP/insertarReserva.php?months=".$mesComparar[$k+1]."&user=".$dniUsers[$index1]."&option=".$option."')>".'Pagar'.'</a>'."</td>";	
		}
	}
}


?>



