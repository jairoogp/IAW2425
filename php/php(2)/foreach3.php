<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>For each 3</title>
</head>
<body>
    <?php
    $tweets = ["Hoy es mi cumpleaños" , "Ha ganado el Racing de Santander", "Mañana no veremos en plaza España!","¡Por fin viernes!"];


    foreach($tweets as $tweet){
        echo "<li>$tweet</li>";
    }
    ?>
</body>
</html>