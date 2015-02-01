
<link href="CSS/calendario.css" rel="stylesheet" type="text/css">

<?php

function showCalendario(){
	
	  $dia = date('j');
	  $m = date('n');
	  $a = date('Y');
	   
	  $nombreMeses=Array(1=>"Enero","Febrero","Marzo","Abril","Mayo",
							  "Junio","Julio", "Agosto","Septiembre","Octubre",
							  "Noviembre","Diciembre");     //<- Para que aparezca en español.
	
	  if ($a>=0 && $a<30) $a+=2000;   // <-- normalizamos el año 
	  if ($a>=30 && $a<100) $a+=1900;  //      a 4 dígitos.
	
	  $dat=mktime(0, 0, 0, $m, 1, $a); //<-- Creamos una fecha del día primero del mes (01/$m/$a)   
	  $diasemana= date("w",$dat);  // <-- determinamos en que día de la semana cae el día primero
	  $totaldias=date("t",$dat);   // <-- determinamos el total de días del mes (28,29,30 ó 31)
	  
	
	/* ****************************
		  PASO 1: Encabezados 
	 ****************************** */   
	  echo "<table id=\"calendario\">";
	  echo "<tr class=\"mesAnyo\"><td colspan=7>".$nombreMeses[date('n')].' - '.$a."</td></tr>";
	  echo "<tr class=\"tituloCalendario\"><td>Dom</td><td>Lun</td><td>Mar</td> 
				 <td>Mie</td><td>Jue</td><td>Vie</td><td>Sab</td></tr>";
	
	/* ****************************
		  PASO 2: Celdas vacías
	 ****************************** */ 
	  echo "<tr>";
	  for($i=0; $i<$diasemana; $i++)
	  {
	   echo "<td></td>";
	  }
	
	/* ****************************
		  PASO 3: Días del mes
	 ****************************** */
	  for($d=1; $d<=$totaldias; $d++)
	  {
		$dat=mktime(0, 0, 0, $m, $d, $a); //<-- Creamos una fecha del día en curso
		$diasemana= date("w",$dat);       //    para poder determinar el día de la semana
		
		if ($d == date('j')){
			echo "<td class=\"hoy\">".$d."</td>";	
		}else if ( ($diasemana == 0) || ($diasemana==6) )
			echo "<td class=\"finDeSemana\">$d</td>";
		else	
			echo "<td>$d</td>"; 
		
		if ($diasemana==6)     //<-- si es sábado, cerramos el renglon y comenzamos uno nuevo
		  echo "</tr><tr>"; 
	  }
	/* ****************************
		 PASO 4: cuadros vacíos al final (omitido)
	 ****************************** */  
	  echo "</tr>";
	  echo "</table>";

}

?>