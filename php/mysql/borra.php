<?php

    $servername = "sql110.thsite.top";
    $username= "thsi_38097882";
    $password= "lLIMj?ad";
    $bd = "thsi_38097882_bdpruebas";
    $enlace = mysqli_connect($servername,$username,$password,$db);
    if(!enlace){
        die ("Ocurrio un problema con la conexión:" .mysqli_connect_error());
    }
    
    $query = "DELETE FROM usuarios where id = 1";

    $resultado =  mysqli_query($enlace, $query);

    if($resultado){
        echo "Registro insertado correctamente";
    }
    else{
        echo "Inserción no realizada";
    }
    mysqli_close($enlace);

?>