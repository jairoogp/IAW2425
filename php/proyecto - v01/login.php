<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
</head>
<body>
    <form method="POST" action="login.php"></form>
    <label for="">Usuario</label><input type="text" name="username" id="username"> <br>
    <label for="">Contraseña</label><input type="password" name="password" id="password"> <br>
    <input type="submit" value="Iniciar sesión">
</body>
</html>

<?php
  $servername = "sql110.thsite.top";
  $username= "thsi_38097882";
  $password= "lLIMj?ad";
  $bd = "thsi_38097882_bdpruebas";
  $enlace = mysqli_connect($servername,$username,$password,$bd);
  if(!$enlace){
      die ("Ocurrio un problema con la conexión:" .mysqli_connect_error());
  if($_SERVER['REQUEST_METHOD'] === "POST"){
    if (empty($_POST['username']) || empty($_POST['password'])) {
        die("Error: Todos los campos son obligatorios.");
    }
    $usuarioo = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
        // Consultar el usuario por email
        $query = "SELECT * FROM usuarios WHERE username='$usuarioo'";
        $resultado = mysqli_query($enlace, $query);
        if(mysqli_num_rows($resultado) === 1){
            $usuario = mysqli_fetch_assoc($resultado);
            $password_hashed = crypt($password, $usuario['password']);
           // if ($usuario['password'] === $password){ // CASO 1 (GRAN ERROR)
                if (hash_equals($usuario['password'], $password_hashed)) {
                    echo "Inicio de sesión exitoso. Bienvenido, " . $usuario['nombre'] . "!";
                } else {
                    echo "Error: Contraseña incorrecta." . $password_hashed . " es diferente de " . $usuario['password'];
                }
            } else {
                echo "Error: Usuario no encontrado.";
            }
        }
  }
  mysqli_close($enlace);
?>