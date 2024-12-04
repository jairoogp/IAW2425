<?php

$fechactual = date('Y-m-d');
$fecha1 = date_create('2025-05-06');
$fecha2 = date_create($fechactual);
$contador = date_diff($fecha1,$fecha2);
$diferrenceformat = '%a';
echo "Quedan " . $contador->format($diferrenceformat) . " días";

?>