<?php

require_once 'db_fx.php';

function registrarUsuario($nombre, $apellido, $password)
{
    // Conectar con la base de datos
    $db = connect();

    // Encriptar la contraseña antes de guardarla
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Consulta SQL
    $query = '
        INSERT INTO usuarios (nombre, apellido, password)
        VALUES (?, ?, ?)
    ';

    // Preparar consulta
    $stmt = $db->prepare($query);

    // Asociar los valores con los ?
    $stmt->bindParam(1, $nombre);
    $stmt->bindParam(2, $apellido);
    $stmt->bindParam(3, $password);

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