<?php
session_start();
include 'config.php';

if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Añadir actividad
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])) {
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

    $query = "INSERT INTO actividad (
        titulo, tipo, departamento, profesor_responsable, trimestre, fecha_inicio, hora_inicio, 
        fecha_fin, hora_fin, organizador, acompanantes, ubicacion, coste, total_alumnos, objetivo
    ) VALUES (
        '$titulo', '$tipo', '$departamento', '$profesor_responsable', $trimestre, '$fecha_inicio', '$hora_inicio', 
        '$fecha_fin', '$hora_fin', '$organizador', '$acompanantes', '$ubicacion', $coste, $total_alumnos, '$objetivo'
    )";
    mysqli_query($enlace, $query);
}

// Eliminar actividad
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $query = "DELETE FROM actividad WHERE id_actividad=$id";
    mysqli_query($enlace, $query);
}

// Obtener actividades
$query = "SELECT * FROM actividad";
$result = mysqli_query($enlace, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h2 {
            color: #333;
        }
        a {
            color: #fff;
            text-decoration: none;
            background-color: #007bff;
            padding: 10px 15px;
            border-radius: 5px;
        }
        a:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            color: white;
            font-size: 14px;
        }
        .btn-edit {
            background-color: #28a745;
        }
        .btn-edit:hover {
            background-color: #218838;
        }
        .btn-delete {
            background-color: #dc3545;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }

        form {
  position: relative;
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 20px;
  background: linear-gradient(to bottom, #0077be, #3b8df2);
  border-radius: 10px;
  overflow: hidden;
  perspective: 1000px;
  transform-style: preserve-3d;
  transform: rotateX(-10deg);
  transition: all 0.3s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
  animation: form-animation 0.5s ease-in-out;
}

@keyframes form-animation {
  from {
    transform: rotateX(-30deg);
    opacity: 0;
  }

  to {
    transform: rotateX(0deg);
    opacity: 1;
  }
}

input {
  padding: 10px;
  border-radius: 5px;
  background-color: transparent;
  transition: border-color 0.3s ease-in-out, background-color 0.3s ease-in-out, transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  transform-style: preserve-3d;
  backface-visibility: hidden;
  color: rgb(255, 255, 255);
  border: 2px solid #3b8df2;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

input::placeholder {
  color: #fff;
}

input:hover,
input:focus {
  border-color: #3b8df2;
  background-color: rgba(255, 255, 255, 0.2);
  transform: scale(1.05) rotateY(20deg);
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.3);
  outline: none;
}

button {
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  background-color: #3b8df2;
  color: #fff;
  font-size: 16px;
  cursor: pointer;
  transform-style: preserve-3d;
  backface-visibility: hidden;
  transform: rotateX(-10deg);
  transition: all 0.3s ease-in-out;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

button:hover {
  background-color: #0077be;
  font-size: 17px;
  transform: scale(1.05) rotateY(20deg) rotateX(10deg);
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset;
}

    </style>
</head>
<body>
    <h2>Bienvenido, <?php echo $_SESSION['username']; ?></h2>
    <a href="logout.php">Cerrar Sesión</a>

    <h3>Añadir Actividad</h3>
    <form method="POST" action="">
        <input type="text" name="titulo" placeholder="Título" required><br>
        <input type="text" name="tipo" placeholder="Tipo" required><br>
        <input type="text" name="departamento" placeholder="Departamento" required><br>
        <input type="text" name="profesor_responsable" placeholder="Profesor Responsable" required><br>
        <input type="text" name="trimestre" placeholder="Trimestre" required><br>
        <input type="date" name="fecha_inicio" placeholder="Fecha Inicio" required><br>
        <input type="time" name="hora_inicio" placeholder="Hora Inicio" required><br>
        <input type="date" name="fecha_fin" placeholder="Fecha Fin" required><br>
        <input type="time" name="hora_fin" placeholder="Hora Fin" required><br>
        <input type="text" name="organizador" placeholder="Organizador" required><br>
        <textarea name="acompanantes" placeholder="acompanantes"></textarea><br>
        <input type="text" name="ubicacion" placeholder="Ubicación" required><br>
        <input type="number" step="0.01" name="coste" placeholder="Coste" required><br>
        <input type="number" name="total_alumnos" placeholder="Total Alumnos" required><br>
        <textarea name="objetivo" placeholder="Objetivo" required></textarea><br>
        <button type="submit" name="add">Añadir</button>
    </form>

    <h3>Lista de Actividades</h3>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Tipo</th>
                <th>Departamento</th>
                <th>Profesor Responsable</th>
                <th>Trimestre</th>
                <th>Fecha Inicio</th>
                <th>Hora Inicio</th>
                <th>Fecha Fin</th>
                <th>Hora Fin</th>
                <th>Organizador</th>
                <th>acompanantes</th>
                <th>Ubicación</th>
                <th>Coste</th>
                <th>Total Alumnos</th>
                <th>Objetivo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['tipo']; ?></td>
                <td><?php echo $row['departamento']; ?></td>
                <td><?php echo $row['profesor_responsable']; ?></td>
                <td><?php echo $row['trimestre']; ?></td>
                <td><?php echo $row['fecha_inicio']; ?></td>
                <td><?php echo $row['hora_inicio']; ?></td>
                <td><?php echo $row['fecha_fin']; ?></td>
                <td><?php echo $row['hora_fin']; ?></td>
                <td><?php echo $row['organizador']; ?></td>
                <td><?php echo $row['acompanantes']; ?></td>
                <td><?php echo $row['ubicacion']; ?></td>
                <td><?php echo $row['coste']; ?></td>
                <td><?php echo $row['total_alumnos']; ?></td>
                <td><?php echo $row['objetivo']; ?></td>
                <td>
                    <a href="?delete=<?php echo $row['id_actividad']; ?>" class="btn btn-delete">Eliminar</a>
                    <a href="edit.php?id=<?php echo $row['id_actividad']; ?>" class="btn btn-edit">Modificar</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>