<?php
session_start();
if (!isset($_SESSION['username']) || !in_array($_SESSION['username'], ['joseluisnunez', 'vicedirector', 'extraescolares'])) {
    header('Location: index.php');
    exit();
}

$servername = "sql110.thsite.top";
$username = "thsi_38097882";
$password = "lLIMj?ad";
$bd = "thsi_38097882_bdpruebas";
$enlace = mysqli_connect($servername, $username, $password, $bd);
if (!$enlace) {
    die("Ocurrió un problema con la conexión: " . mysqli_connect_error());
}

$id = $_GET['id'];
$query = "DELETE FROM actividad WHERE id = $id";

if (mysqli_query($enlace, $query)) {
    echo "Actividad eliminada exitosamente.";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($enlace);
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Actividad</title>
</head>
<body>
    <a href="dashboard.php">Volver al Dashboard</a>
</body>
</html>
