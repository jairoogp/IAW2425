<?php

    $servername = "sql110.thsite.top";
    $username= "thsi_38097882";
    $password= "lLIMj?ad";
    $bd = "thsi_38097882_bdpruebas";
    $enlace = mysqli_connect($servername,$username,$password,$bd);
    if(!$enlace){
        die ("Ocurrio un problema con la conexión:" .mysqli_connect_error());
    }
    
    $query = "ALTER TABLE usuarios ADD fullname varchar(50), ADD email varchar(20)";
    
    $resultado = mysqli_query($enlace, $query);

    if($resultado){
        echo "Registro alterado correctamente";
    }
    else{
        echo "Inserción no realizada";
    }
    mysqli_close($enlace);

?>