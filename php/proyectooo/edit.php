<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $query = "SELECT * FROM actividad WHERE id_actividad=$id";
    $result = mysqli_query($enlace, $query);
    $row = mysqli_fetch_assoc($result);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit'])) {
    $id = intval($_POST['id']);
    $titulo = mysqli_real_escape_string($enlace, $_POST['titulo']);
    $tipo = mysqli_real_escape_string($enlace, $_POST['tipo']);
    $departamento = mysqli_real_escape_string($enlace, $_POST['departamento']);
    $profesor_responsable = mysqli_real_escape_string($enlace, $_POST['profesor_responsable']);
    $trimestre = intval($_POST['trimestre']);
    $fecha_inicio = mysqli_real_escape_string($enlace, $_POST['fecha_inicio']);
    $hora_inicio = mysqli_real_escape_string($enlace, $_POST['hora_inicio']);
    $fecha_fin = mysqli_real_escape_string($enlace, $_POST['fecha_fin']);
    $hora_fin = mysqli_real_escape_string($enlace, $_POST['hora_fin']);
    $organizador = mysqli_real_escape_string($enlace, $_POST['organizador']);
    $acompanantes = mysqli_real_escape_string($enlace, $_POST['acompanantes']);
    $ubicacion = mysqli_real_escape_string($enlace, $_POST['ubicacion']);
    $coste = intval($_POST['coste']);
    $total_alumnos = intval($_POST['total_alumnos']);
    $objetivo = mysqli_real_escape_string($enlace, $_POST['objetivo']);

    $query = "UPDATE actividad SET 
        titulo='$titulo', tipo='$tipo', departamento='$departamento', profesor_responsable='$profesor_responsable', 
        trimestre=$trimestre, fecha_inicio='$fecha_inicio', hora_inicio='$hora_inicio', fecha_fin='$fecha_fin', 
        hora_fin='$hora_fin', organizador='$organizador', acompanantes='$acompanantes', ubicacion='$ubicacion', 
        coste=$coste, total_alumnos=$total_alumnos, objetivo='$objetivo' 
        WHERE id_actividad=$id";
    mysqli_query($enlace, $query);
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Actividad</title>
    <style>
        /* Agrega el mismo estilo CSS que en dashboard.php */
    </style>
</head>
<body>
    <h2>Modificar Actividad</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $row['id_actividad']; ?>">
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required><br>
        <input type="text" name="tipo" value="<?php echo $row['tipo']; ?>" required><br>
        <input type="text" name="departamento" value="<?php echo $row['departamento']; ?>" required><br>
        <input type="text" name="profesor_responsable" value="<?php echo $row['profesor_responsable']; ?>" required><br>
        <input type="text" name="trimestre" value="<?php echo $row['trimestre']; ?>" required><br>
        <input type="date" name="fecha_inicio" value="<?php echo $row['fecha_inicio']; ?>" required><br>
        <input type="time" name="hora_inicio" value="<?php echo $row['hora_inicio']; ?>" required><br>
        <input type="date" name="fecha_fin" value="<?php echo $row['fecha_fin']; ?>" required><br>
        <input type="time" name="hora_fin" value="<?php echo $row['hora_fin']; ?>" required><br>
        <input type="text" name="organizador" value="<?php echo $row['organizador']; ?>" required><br>
        <textarea name="acompanantes"><?php echo $row['acompanantes']; ?></textarea><br>
        <input type="text" name="ubicacion" value="<?php echo $row['ubicacion']; ?>" required><br>
        <input type="number" step="0.01" name="coste" value="<?php echo $row['coste']; ?>" required><br>
        <input type="number" name="total_alumnos" value="<?php echo $row['total_alumnos']; ?>" required><br>
        <textarea name="objetivo" required><?php echo $row['objetivo']; ?></textarea><br>
        <button type="submit" name="edit">Guardar Cambios</button>
    </form>
</body>
</html>