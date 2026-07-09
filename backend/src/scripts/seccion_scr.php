<?php

require_once "../functions/user_fx.php";


// Procesar registro
if (isset($_POST["register"])) {

    // Recibir datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $password = $_POST["password"];


    // Llamar a la función que inserta en la base
    $result = registrarUsuario($nombre, $apellido, $password);


    // Revisar resultado
    if ($result["query"]) {

        echo "Usuario registrado correctamente";

    } else {

        echo "Error al registrar usuario";
        echo $result["error"][2];

    }

}

?>