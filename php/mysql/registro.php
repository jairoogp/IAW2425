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
        <label for="">Apellidos:</label> <input type="text" name="apellidos" id="apellidos"><br>
        <label for="">Email:</label><input type="email" name="email" id="email">
        <label for="">Contraseña:</label> <input type="password" name="contrasena" id="contrasena"><br>
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
                    if(empty($_POST['nombre'])) || (empty($_POST['apellidos'])) || (empty($_POST['email'])) || (empty($_POST['contrasena'])){
                        die("Error: Todos los campos son obligatorios")
                    }
              }
              //saneamiento de las entradas
              $nombre = htmlspecialchars(trim($_POST['nombre']));
              $apellidos = htmlspecialchars(trim($_POST['apellidos']));
              $email = htmlspecialchars(trim($_POST['email']));
              $password = htmlspecialchars(trim($_POST['contrasena']));
              // verificar si el usuario existe
              $query = "SELECT id FROM usuarios WHERE email='$email'";
              $resultado = mysqli_query($enlace, $query);
              if(mysqli_num_rows($resultado) > 0){
                echo "<p> Error: El usuario ya está registrado. </p>"
              }
              else{
                $password_encrypted = crypt($password, '$6$rounds=5000$' . uniqid(mt_rand(), true) . '$');
                $query = "INSERT INTO usuarios (username,password,fullname,email) VALUES ('$nombre','$password_encrypted','$apellidos','$email')";

                if(mysqli_query($enlace,$query)){
                    $asunto = "Registro exitoso";
                    $mensaje = "Hola $nombre, Gracias por registrarte . Estos son tus datos: \nNombre:$nombre\nApellidos: $apellidos\nEmail:$email\n\nSaludos.";
                    $cabeceras = "From: no-reply@mi-sitio.com";
                if(mail($email,$asunto,$mensaje,$cabeceras)){
                    echo "Usuario registrado correctamente."
                }else{
                    echo "Usuario registrado, pero no se pudo enviar el correo"
                }
                }
                else{
                    "Error al registrar el usuario: " .mysqli_error($enlace);
                }
            }
            mysqli_close($enlace);
?>
</body>
</html>