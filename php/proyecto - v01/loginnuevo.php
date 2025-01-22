<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
</head>
<body>
    <form method="POST" action="">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required> <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required> <br>
        <input type="submit" value="Iniciar sesión">
    </form>

    <?php
    // Usuarios y contraseñas predefinidos
    $usuarios_validos = [
        'joseluisnunez' => '$2y$10$.fFP6viq9oS/yoHkvOFO4eDYY.mqSFkdO8btaWCjHXKzzIzwtqZxm ', //joseluis25
        'vicedirector' => '$2y$10$gmi.sIaAJV2q20ROFnruiunTtisPy9zNPeKDHPMGuP3tyB5Lf5LVO',
        'extraescolares' => '$2y$10$nQwBgrgZM8jIlxgwax8CtecfffitSrU09IyctMdM9rHaRJVZqLct2'
    ];

    // Procesar el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        // Validar usuario y contraseña
        if (isset($usuarios_validos[$username]) && usuarios_validos[$username] === $password){
            echo "<p>Inicio de sesión exitoso. Bienvenido, $username!</p>";
        } else {
            echo "<p>Error: Usuario o contraseña incorrectos.</p>";
        }
    }
    ?>
</body>
</html>
