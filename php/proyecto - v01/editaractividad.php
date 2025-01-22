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
    $query = "SELECT * FROM actividad WHERE id = $id";
    $resultado = mysqli_query($enlace, $query);
    $actividad = mysqli_fetch_assoc($resultado);

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
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

    $query = "UPDATE actividad SET titulo='$titulo', tipo='$tipo', departamento='$departamento', profesor_responsable='$profesor_responsable', trimestre='$trimestre', fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', hora_fin='$hora_fin', organizador='$organizador', acompañantes='$acompañantes', ubicacion='$ubicacion', coste='$coste', total_alumnos='$total_alumnos', objetivo='$objetivo' WHERE id=$id;"

       if (mysqli_query($enlace, $query)) {
        echo "Actividad actualizada exitosamente.";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($enlace);
    }

    mysqli_close($enlace);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar actividad</title>
</head>
<body>
    <h2>Editar actividad</h2>

    <form method ="POST" action="">
    <label for="titulo">Título</label>
        <input type="text" name="titulo" id="titulo" value="<?php echo $actividad['titulo']; ?>" required> <br>
        <label for="tipo">Tipo</label>
        <input type="text" name="tipo" id="tipo" value="<?php echo $actividad['tipo']; ?>" required> <br>
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" value="<?php echo $actividad['departamento']; ?>" required> <br>
        <label for="profesor_responsable">Profesor Responsable</label>
        <input type="text" name="profesor_responsable" id="profesor_responsable" value="<?php echo $actividad['profesor_responsable']; ?>" required> <br>
        <label for="trimestre">Trimestre</label>
        <input type="text" name="trimestre" id="trimestre" value="<?php echo $actividad['trimestre']; ?>" required> <br>
        <label for="fecha_inicio">Fecha Inicio</label>
        <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $actividad['fecha_inicio']; ?>" required> <br>
        <label for="hora_inicio">Hora Inicio</label>
        <input type="time" name="hora_inicio" id="hora_inicio" value="<?php echo $actividad['hora_inicio']; ?>" required> <br>
        <label for="fecha_fin">Fecha Fin</label>
        <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $actividad['fecha_fin']; ?>" required> <br>
        <label for="hora_fin">Hora Fin</label>
        <input type="time" name="hora_fin" id="hora_fin" value="<?php echo $actividad['hora_fin']; ?>" required> <br>
        <label for="organizador">Organizador</label>
        <input type="text" name="organizador" id="organizador" value="<?php echo $actividad['organizador']; ?>" required> <br>
        <label for="acompañantes">Acompañantes</label>
        <input type="text" name="acompañantes" id="acompañantes" value="<?php echo $actividad['acompañantes']; ?>" required> <br>
        <label for="ubicacion">Ubicación</label>
        <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $actividad['ubicacion']; ?>" required> <br>
        <label for="coste">Coste</label>
        <input type="number" name="coste" id="coste" value="<?php echo $actividad['coste']; ?>" required> <br>
        <label for="total_alumnos">Total Alumnos</label>
        <input type="number" name="total_alumnos" id="total_alumnos" value="<?php echo $actividad['total_alumnos']; ?>" required> <br>
        <label for="objetivo">Objetivo</label>
        <input type="text" name="objetivo" id="objetivo" value="<?php echo $actividad['objetivo']; ?>" required> <br>
        <input type="submit" value="Actualizar Actividad">
    </form>
    <a href="dashboard.php">Volver al dashboard</a>
</body>
</html>