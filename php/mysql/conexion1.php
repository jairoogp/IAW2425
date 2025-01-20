<?php
    $servername = "sql110.thsite.top"
    $username = "thsi_38097882"
    $password = "lLIMj?ad"


    
    // Create connection
    $conn = new mysqli($servername, $username, $password);
    
    // Check connection
    if ($conn->connect_error) {
      die("Conexión faliida: " . $conn->connect_error);
    }
    echo "Conexión exitosa!";
    ?> 