<?php
session_start();

require_once "../functions/user_fx.php";
require_once "../functions/session_fx.php";


// Procesar registro
if (isset($_POST["register"])) {

    // Recibir datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $password = $_POST["password"];

    // llamar a la funcion para verificar si el usuario ya existe
    $username = generarUsername($nombre, $apellido);
    if (existeUsuario($username)) {
        for ($i = 1; $i <= 100; $i++) {
            $nuevoUsername = $username . $i;
            if (!existeUsuario($nuevoUsername)) {
                $username = $nuevoUsername;
                break;
            }
        }
    }
    // Llamar a la función que inserta en la base
    $result = registrarUsuario($nombre, $apellido, $username, $password);


    // Revisar resultado
    if ($result["query"]) {

        echo "Usuario registrado correctamente, tu nombre de usuario es: " . $username."<br>";
        echo "<br><a href='../login.php'>Iniciar sesión</a>";
    } else {

        echo "Error al registrar usuario";
        echo $result["error"][2];

    }

}


// Procesar formulario de login
if (isset($_POST["login"])) {

    // Recibir datos del formulario
    $username = trim($_POST["username"]);
    $password = $_POST["password"];

    // Buscar el usuario en la base de datos
    $result = login($username);

    // ¿La consulta SQL se ejecutó correctamente?
    if ($result["query"]) {

        // ¿Existe un usuario con ese username?
        if ($result["rows"] != 0) {

            // ¿La contraseña coincide?
            if (password_verify($password, $result["data"]["password"])) {

                // Crear la sesión
                $_SESSION["id"] = $result["data"]["id"];
                $_SESSION["nombre"] = $result["data"]["nombre"];
                $_SESSION["apellido"] = $result["data"]["apellido"];
                $_SESSION["username"] = $result["data"]["username"];

                // Ir al inicio
                header("Location: ../index.php");
                exit();

            } else {

                echo "Contraseña incorrecta";

            }

        } else {

            echo "El usuario no existe";

        }

    } else {

        echo $result["error"][2];

    }

} 
