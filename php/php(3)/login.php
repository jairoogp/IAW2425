<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="login.php">


    <input type="text" name="usuario" placeholder="Usuario">
    <input type="password" name="pass" placeholder="Contraseña" id="">
    <input type="submit" value="Login">
    </form>
<?php
    if(isset($_POST["usuario"]) && isset($_POST["pass"])){
        $usuario = htmlspecialchars($_POST["usuario"]);
        $password = htmlspecialchars($_POST["pass"]);
        if($usuario=="admin" && $password=="H4CK3R4$1R")
            echo "<p>Bienvenido amo</p>";
        else
            echo "<p>No puedes pasar hacker!</p>";
    }
?>
</body>
</html>