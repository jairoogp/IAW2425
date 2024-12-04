<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super globales</title>
</head>
<body>
    <a href=""></a>
    <?php
    
    echo "La dirección IP de la que te estás conectando es " . $_SERVER['REMOTE_ADDR'] . ", el navegador que utilizas es " . $_SERVER['HTTP_USER_AGENT'] . " y la página previa es " . $_SERVER['HTTP_REFERER'] . "<br>";
    ?>
</body>
</html>