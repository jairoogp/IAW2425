<?php
 $servername = "sql110.thsite.top";
 $username = "thsi_38097882";
 $password = "lLIMj?ad";

 $conn = mysqli_connect($servername, $username, $password);
    
 // Check connection
 if (!$conn) {
   die("Conexión faliida: " . mysqli_connect_error());
 }
 echo "Conexión exitosaaaaaaaaaaaaaaaa!";
 ?> 