<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de usuario</title>
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor del formulario */
        form {
            background: rgba(255, 255, 255, 0.9);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        /* Estilos para las etiquetas */
        label {
            display: block;
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
            text-align: left;
        }

        /* Estilos para los inputs */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #6a11cb;
        }

        /* Estilos para el botón */
        #boton {
            background: #6a11cb;
            color: white;
            font-size: 18px;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        #boton:hover {
            background: #2575fc;
            transform: translateY(-2px);
        }

        #boton:active {
            transform: translateY(0);
        }

        /* Estilos para el texto del botón */
        #boton {
            text-transform: uppercase;
            font-weight: bold;
        }

        /* Estilos para el mensaje de error */
        #parrafo {
            color: #ff4d4d;
            font-size: 16px;
            margin-top: 15px;
            display: none; /* Oculto por defecto */
        }

        /* Mostrar el mensaje de error */
        #parrafo.show {
            display: block;
        }

        /* Estilos para el contenedor del formulario en pantallas pequeñas */
        @media (max-width: 480px) {
            form {
                padding: 20px;
            }

            input[type="text"],
            input[type="password"] {
                font-size: 14px;
            }

            #boton {
                font-size: 16px;
                padding: 10px 20px;
            }

            #parrafo {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <form method="POST" action="">
        <label for="username">Usuario</label>
        <input type="text" name="username" id="username" required> <br>
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" required> <br>
        <input type="submit" id="boton" value="Iniciar sesión">
        <!-- Mensaje de error -->
        <?php
        session_start();

        // Usuarios y contraseñas predefinidos
        $usuarios_validos = [
            'joseluisnunez' => '$2y$10$.fFP6viq9oS/yoHkvOFO4eDYY.mqSFkdO8btaWCjHXKzzIzwtqZxm',
            'vicedirector' => '$2y$10$gmi.sIaAJV2q20ROFnruiunTtisPy9zNPeKDHPMGuP3tyB5Lf5LVO',
            'extraescolares' => '$2y$10$nQwBgrgZM8jIlxgwax8CtecfffitSrU09IyctMdM9rHaRJVZqLct2'
        ];

        // Procesar el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            // Validar usuario y contraseña
            if (isset($usuarios_validos[$username]) && password_verify($password, $usuarios_validos[$username])) {
                $_SESSION['username'] = $username;
                header('Location: dashboard.php');
                exit();
            } else {
                echo "<p id='parrafo' class='show'>Error: Usuario o contraseña incorrectos.</p>";
            }
        }
        ?>
    </form>
</body>
</html>