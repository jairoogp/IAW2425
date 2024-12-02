<?php
/*$dias = array("Domingo","Lunes","Martes","Miércoles","Jueves")
$dia = date("d");
$mes = date("m");
$ano = date("Y");

echo "Hoy es " . $dia " de " . $mes . " de " . $ano;*/

$dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
 
echo $dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
?>