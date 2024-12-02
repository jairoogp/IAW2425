<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
   $refranes = [
    "A buen hambre no hay mal pan",
    "Camarón que se duerme, se lo lleva la corriente",
    "El que mucho abarca, poco aprieta",
    "En casa de herrero, cuchillo de palo",
    "A falta de pan, buenas son tortas",
    "Cree el ladrón que todos son de su condición",
    "Más vale tarde que nunca",
    "El que no arriesga, no gana",
    "No hay mal que por bien no venga",
    "Ojos que no ven, corazón que no siente"
   ];
   echo "<ul>";          // empezar una lista no ordenada
   foreach($refranes as $refran){      
        echo "<li>$refran</li>";        // escribo un refran
   }
   echo "</ul>";                            // termino la lista
   
   ?>
</body>
</html>