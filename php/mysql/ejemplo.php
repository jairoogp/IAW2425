<?php
// Configuración inicial
$servername = "sql110.thsite.top";
$username = "thsi_38097882";
$password = "lLIMj?ad";
$bd = "thsi_38097882_bdpruebas";

$enlace = mysqli_connect($servername, $username, $password, $bd);

if (!$enlace) {
    die("Error al conectar con la base de datos: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $fullname = trim($_POST["fullname"]);
    $email = trim($_POST["email"]);
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Validar campos no vacíos
    if (empty($fullname) || empty($email) || empty($username) || empty($password)) {
        echo "Todos los campos son obligatorios.";
    } else {
        // Saneamiento de entradas
        $fullname = mysqli_real_escape_string($enlace, htmlspecialchars($fullname));
        $email = mysqli_real_escape_string($enlace, filter_var($email, FILTER_SANITIZE_EMAIL));
        $username = mysqli_real_escape_string($enlace, htmlspecialchars($username));
        $password = password_hash($password, PASSWORD_BCRYPT); // Cifrar la contraseña

        // Verificar si el usuario o email ya existe
        $query_check = "SELECT * FROM usuarios WHERE username = '$username' OR email = '$email'";
        $result_check = mysqli_query($enlace, $query_check);

        if (mysqli_num_rows($result_check) > 0) {
            echo "El usuario o el email ya están registrados.";
        } else {
            // Insertar el nuevo usuario
            $query_insert = "INSERT INTO usuarios (fullname, email, username, password) VALUES ('$fullname', '$email', '$username', '$password')";
            $result_insert = mysqli_query($enlace, $query_insert);

            if ($result_insert) {
                // Enviar correo electrónico
                $to = $email;
                $subject = "Registro completado";
                $message = "Hola $fullname,\n\nGracias por registrarte. Estos son tus datos:\nUsername: $username\nEmail: $email\n\n¡Bienvenido!";
                $headers = "From: no-reply@ejemplo.com";

                if (mail($to, $subject, $message, $headers)) {
                    echo "Registro exitoso. Se ha enviado un correo de confirmación.";
                } else {
                    echo "Registro exitoso, pero no se pudo enviar el correo.";
                }
            } else {
                echo "Error al registrar el usuario: " . mysqli_error($enlace);
            }
        }
    }
}

mysqli_close($enlace);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form action="" method="POST">
        <label for="fullname">Nombre completo:</label><br>
        <input type="text" name="fullname" id="fullname" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="username">Nombre de usuario:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Registrarse</button>
    </form>
</body>
</html>