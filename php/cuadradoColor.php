<?php
function generarColorAleatorio() { 
	$rojo = rand(0, 255); 
	$verde = rand(0, 255); 
	$azul = rand(0, 255); 
	return "rgb($rojo,$verde,$azul)"; 
} 
$color = generarColorAleatorio();

	echo "<div style='width: 300px; height: 300px;background-color: $color;'></div>";
?>
