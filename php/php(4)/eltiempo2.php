<?php

    $text = file_get_contents("https://www.eltiempo.es/");
    $resultado = (explode("<span class='degrees' data-temperature=''></span>",$text));

    print_r($resultado[0]);
?>