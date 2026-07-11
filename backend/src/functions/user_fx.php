<?php

require_once 'db_fx.php';

function registrarUsuario($nombre, $apellido, $username, $password)
{
    // Conectar con la base de datos
    $db = connect();

    // Encriptar la contraseña antes de guardarla
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Consulta SQL
    $query = '
        INSERT INTO usuarios (nombre, apellido, username, password)
        VALUES (?, ?, ?, ?)
    ';

    // Preparar consulta
    $stmt = $db->prepare($query);

    // Asociar los valores con los ?
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $apellido);
    $stmt->bindParam(3, $username);
    $stmt->bindParam(4, $password);

    // Ejecutar consulta
    if ($stmt->execute()) {

        $result = [
            "query" => true,

            "rows" => $stmt->rowCount()
        ];

        return $result;

    } else {

        $result = [
            "query" => false,
            "error" => $stmt->errorInfo()
        ];

        return $result;
    }
}

function existeUsuario($username)
{
    // Conectar con la base de datos
    $db = connect();

    // Consulta SQL
    $query = '
        SELECT * FROM usuarios WHERE username = ?
    ';

    // Preparar consulta
    $stmt = $db->prepare($query);

    // Asociar el valor con el ?
    $stmt->bindParam(1, $username);

    // Ejecutar consulta
    $stmt->execute();

    // Verificar si se encontró un usuario con ese nombre de usuario
    if ($stmt->rowCount() > 0) {
        return true; // El usuario existe
    } else {
        return false; // El usuario no existe
    }
}

function generarUsername($nombre, $apellido)
{
    // Convertir a minúsculas
    $nombre = strtolower($nombre);
    $apellido = strtolower($apellido);

    // Obtener la primera letra del nombre
    $primerLetraNombre = substr($nombre, 0, 1);

    // Concatenar la primera letra del nombre con el apellido
    $username = $primerLetraNombre . $apellido;

    return $username;
}