<?php
    $text = file_get_contents("eltiempo.html");

    //print_r(explode("<td>",$text));     //el <td> hace de separador

    $resultado = (explode("<td>",$text));
    echo $resultado[4];
?>