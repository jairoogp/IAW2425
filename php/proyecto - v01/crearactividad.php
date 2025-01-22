<?php

session_start();
if (!isset($_SESSION['username']) || !in_array($_SESSION['username'], ['joseluisnunez', 'vicedirector', 'extraescolares'])) {
    header('Location: index.php');
    exit();
}
if($_SERVER['REQUEST_METHOD'] === "POST"){
    $servername = "sql110.thsite.top";
    $username = "thsi_38097882";
    $password = "lLIMj?ad";
    $bd = "thsi_38097882_bdpruebas";
    $enlace = mysqli_connect($servername, $username, $password, $bd);
    if (!$enlace) {
        die("Ocurrió un problema con la conexión: " . mysqli_connect_error());
    }
    $titulo = $_POST['titulo'];
    $tipo = $_POST['tipo'];
    $departamento = $_POST['departamento'];
    $profesor_responsable = $_POST['profesor_responsable'];
    $trimestre = $_POST['trimestre'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $hora_inicio = $_POST['hora_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $hora_fin = $_POST['hora_fin'];
    $organizador = $_POST['organizador'];
    $acompañantes = $_POST['acompañantes'];
    $ubicacion = $_POST['ubicación'];
    $coste = $_POST['coste'];
    $total_alumnos = $_POST['total_alumnos'];
    $objetivo = $_POST['objetivo'];

    $query = "INSERT INTO actividad (titulo, tipo, departamento, profesor_responsable, trimestre, fecha_inicio, hora_inicio, fecha_fin, hora_fin, organizador, acompañantes, ubicacion, coste, total_alumnos, objetivo) VALUES ('$titulo', '$tipo', '$departamento', '$profesor_responsable', '$trimestre', '$fecha_inicio', '$hora_inicio', '$fecha_fin', '$hora_fin', '$organizador', '$acompañantes', '$ubicacion', '$coste', '$total_alumnos', '$objetivo')";

    if(mysqli_query($enalce,$query)){
        echo "Actividad agregada exitosamente";
    }else{
        echo "Error" .$query . "<br>" . mysqli_error($enlace);
    }
    mysqli_close($enlace);
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir actividad</title>
</head>
<body>
    <h2>Añadir nueva actividad</h2>

    <form method ="POST" action="">
    <label for="">Título:</label> <input type="text" name="titulo" id="titulo"> <br>
    <label for="">Tipo:</label> <input type="text" name="tipo" id="tipo"> <br>
    <label for="">Departamento:</label> <input type="text" name="departamento" id="departamento"> <br>
    <label for="">Profesor Responsable:</label> <input type="text" name="profesor_responsable" id="profesor_responsable"> <br>
    <label for="">Trimestre:</label> <input type="text" name="trimestre" id="trimestre"> <br>
    <label for="">Fecha de Inicio:</label> <input type="date" name="fecha_inicio" id="fecha_inicio"> <br>
    <label for="">Hora de Inicio:</label> <input type="time" name="hora_inicio" id="hora_inicio"> <br>
    <label for="">Fecha Fin:</label> <input type="date" name="fecha_fin" id="fecha_fin"> <br>
    <label for="">Hora Fin:</label> <input type="time" name="hora_fin" id="hora_fin"> <br>
    <label for="">Organizador:</label> <input type="text" name="organizador" id="organizador"> <br>
    <label for="">Acompañantes:</label> <input type="text" name="acompañantes" id="acompañantes"> <br>
    <label for="">Ubicación:</label> <input type="text" name="ubicación" id="ubicación"> <br>
    <label for="">Coste:</label> <input type="text" name="coste" id="coste"> <br>
    <label for="">Total de Alunmnos:</label> <input type="text" name="total_alumnos" id="total_alumnos"> <br>
    <label for="">Objetivo:</label> <input type="text" name="objetivo" id="objetivo"> <br>
    <input type="submit" value="Añadir actividad"> <br>
    </form>
    <a href="dashboard.php">Volver al dashboard</a>
</body>
</html>