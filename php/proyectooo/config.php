<?php
$servername = "sql110.thsite.top";
$username = "thsi_38097882";
$password = "lLIMj?ad";
$bd = "thsi_38097882_bdpruebas";
$enlace = mysqli_connect($servername, $username, $password, $bd);
if (!$enlace) {
    die("Ocurrió un problema con la conexión: " . mysqli_connect_error());
}
?>