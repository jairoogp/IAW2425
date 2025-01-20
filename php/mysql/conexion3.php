<?php
$servername = "sql110.thsite.top";
$username = "thsi_38097882";
$password = "lLIMj?ad";

try {
  $conn = new PDO("mysql:host=$servername;dbname=thsi_38097882_bdpruebas", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 
