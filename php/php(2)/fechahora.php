<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fecha y hora</title>
</head>
<body>
    <?php
    date_default_timezone_set("Europe/Madrid");
    echo "Hoy es " . date("d/m/Y") . " y son las " . date("h:i:s") . "<br>";
    ?>
</body>
</html>