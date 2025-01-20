<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de registro</title>
</head>
<body>
        <h1>Registro de Usuario</h1>

        <form action="" method="POST">
        <label for="">Nombre:</label> <input type="text" name="nombre" id="nombre"><br>
        <label for="">Primer apellido:</label> <input type="text" name="apellido1" id="apellido1"><br>
        <label for="">Segundo apellido:</label> <input type="text" name="apellido2" id="apellido2"><br>
        <label for="">Email:</label><input type="email" name="email" id="email">
        <label for="">Contraseña:</label> <input type="password" name="contrasena" id="contrasena"><br>
        <label for="">Repita su contraseña:</label> <input type="password" name="contrasena2" id="contrasena2"><br>

        <button>Registrarse</button>
        </form>

        <?php
              $servername = "sql110.thsite.top";
              $username= "thsi_38097882";
              $password= "lLIMj?ad";
              $bd = "thsi_38097882_bdpruebas";
              $enlace = mysqli_connect($servername,$username,$password,$bd);
              if(!$enlace){
                  die ("Ocurrio un problema con la conexión:" .mysqli_connect_error());
              }
              if($_SERVER['REQUEST_METHOD'] === "POST"){
                    if(empty($_POST['nombre']) || (empty($_POST['apellidos']) || (empty($_POST['email']) || (empty($_POST['email']))
              }
              
        ?>
</body>
</html>