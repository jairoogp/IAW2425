<?php
    if(!isset($_SESSION['username']) || | !in_array($_SESSION['username'], ['joseluisnunez', 'vicedirector', 'extraescolares'])){
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']);?></h2>
    <p>Este es el dashboard donde puedes gestionar las actividades</p>
    <a href="logout.php">Cerrar sesión</a> <br>
    <h2>Gestión de actividades</h2>
    <a href="crearactividad.php">Añadir una actividad</a>
    //Conexion a la base de datos 
    <?php
    $servername = "sql110.thsite.top";
    $username= "thsi_38097882";
    $password= "lLIMj?ad";
    $bd = "thsi_38097882_bdpruebas";
    $enlace = mysqli_connect($servername,$username,$password,$bd);
    if(!$enlace){
        die ("Ocurrio un problema con la conexión:" .mysqli_connect_error());
    }
    //Consultar las actividades
    $query = "SELECT * FROM actividad";
    $resultado =  mysqli_query($enlace, $query);
    if(mysqli_num_rows($resultado) > 0){
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Departamento</th>
                <th>Profesor_Responsable</th>
                <th>Trimestre</th>
                <th>Fecha_Inicio</th>
                <th>Hora_Inicio</th>
                <th>Fecha_Fin</th>
                <th>Hora_Fin</th>
                <th>Organizador</th>
                <th>Acompañantes</th>
                <th>Ubicación</th>
                <th>Coste</th>
                <th>Total_alumnos</th>
                <th>Objetivo</th>          
            </tr>";
            while($row = mysqli_fetch_assoc($resultado)){

            echo "<tr>
                        <td>". $row['id'] . "</td>
                        <td>". $row['titulo'] . "</td>
                        <td>". $row['tipo'] . "</td>
                        <td>". $row['departamento'] . "</td>
                        <td>". $row['profesor_responsable'] . "</td>
                        <td>". $row['trimestre'] . "</td>
                        <td>". $row['fecha_inicio'] . "</td>
                        <td>". $row['hora_inicio'] . "</td>
                        <td>". $row['fecha_fin'] . "</td>
                        <td>". $row['hora_fin'] . "</td>
                        <td>". $row['organizador'] . "</td>
                        <td>". $row['acompañantes'] . "</td>
                        <td>". $row['ubicación'] . "</td>
                        <td>". $row['coste'] . "</td>
                        <td>". $row['total_alumnos'] . "</td>
                        <td>". $row['objetivo'] . "</td>
                        <td>
                            <a href='editaractividad.php?id=" .$row['id'] . "'>Editar</a>
                            <a href='borraractividad.php?id=" .$row['id'] . "'>Eliminar</a>
                        </td>
                        </tr>";
            }
            echo "</table>";}
            else{
                echo "No hay actividades registradas";
            }
mysqli_close($enlace);
    ?>
    
</body>
</html>