<?php
    // Conexión con base de datos
    $servername = "sql110.thsite.top";
    $username = "thsi_38097882";
    $password = "lLIMj?ad";
    $bd="thsi_38097882_bdpruebas";
    $enlace = mysqli_connect($servername,$username,$password,$bd)

    if(!$enlace){
        die("Ocurró un problema con la conexión :" .mysqli_connect_error());
    }
    // Construcción de la query
    $query = "SELECT * FROM usuarios LIMIT 1";
    // Ejecución de la Query 
    $resultado = mysqli_query($enlace, $query);

    // Procesamiento de los resultados
    print_r("$resultado");
    if(mysqli_num_rows($resultado)>){
        while($fila = mysqli_fetch_assoc($resultado)){
            echo "Nombre: " .$fila["nombre"] . "Apellido; " .$fila["apellidos"] . "Email: " .$fila["email"] . "<br>"
        }
    }
    else{
        echo "<p>No hubo resultados en la tabla </p>";
    }
    // Cierre de la conexión
    mysqli_close($enlace);


?>