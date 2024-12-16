<?php
    include "config.php";
    echo "<h1> Inclusión de constantes y variables</h1>";
    echo "Base de datos:" .constant("BASE_DE_DATOS") . "<br>";
    echo "Usuario:" .constant("USUARIO") . "<br>";
    echo "Nombre de la APP:" .constant("APP_NAME") . "<br>";
    echo "Directorio del upload" .constant("UPLOAD_DIR") . "<br>";

?>