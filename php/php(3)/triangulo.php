<!doctype html>
<html>
<head>
	<title>Examen</title>
</head>
<body>
<h1>Triángulo</h1>
<form id="formulario" action="triangulo.php">
	<input type="text" name="numero" id="numero">
	<input type="submit" value="Enviar">
</form>
<?php
	if (isset($_GET["numero"])){                // verifica si se ha enviado el parámetro número
		$numero = htmlspecialchars($_GET["numero"]);        // evita inyecciones de código
		if ($numero>0 && is_numeric($numero)){              //comprueba que es positivo y es numérico
			
    /*    if ($numero>0 && is_numeric($numero)){              //comprueba que es positivo y es numérico
            for ($i=1;$i<=$numero;$i++)     // inicia la variable con el valor de numero ingresado por usuario // El bucle continuará ejecutándose mientras $i sea mayor o igual a 1 Después de cada iteración, $i se decrementa >
            {       
                    for($j=1;$j<=$i;$j++)       // esto es para hacerlo de menor a mayor //el otro para hacerlo de mayor a menor
                    {
                            echo "* ";
                    }
                    echo "<br>";
            }
    }
*/
		else{
			echo "<p>Error. Hacker no te saltes el Javascript!</p>";
		}
	}
?>
<script>
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("formulario").addEventListener('submit', compruebaNumero); 
});
	function compruebaNumero(evento){
		evento.preventDefault();
		let numero=parseInt(document.getElementById('numero').value);
		if (numero<=0 || isNaN(numero)){
			alert("¡Error!¡Debes escribir número positivo mayor que cero!");
			return;
		}
		this.submit();
	}
</script>
</body>
</html>