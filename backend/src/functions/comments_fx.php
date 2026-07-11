<?php

require_once "db_fx.php";
function crearComentario($usuario_id, $comentario)
{
    $db = connect();

    $query = "
        INSERT INTO comentarios (usuario_id, comentario)
        VALUES (?, ?)
    ";

    $stmt = $db->prepare($query);

    $stmt->bindParam(1, $usuario_id);
    $stmt->bindParam(2, $comentario);

    if ($stmt->execute()) {

        $result = [
            "query" => true,
            "lastInsertId" => $db->lastInsertId()
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

function obtenerComentarios()
{
    $db = connect();

    $query = "
    SELECT
    comentarios.comentario,
    usuarios.username
FROM comentarios
JOIN usuarios
ON comentarios.usuario_id = usuarios.id
    ";

    $stmt = $db->prepare($query);

    if ($stmt->execute()) {

        $result = [
            "query" => true,
            "data"  => $stmt->fetchAll(PDO::FETCH_ASSOC)
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

function obtenerComentariosPorUsuario($usuario_id)
{
    $db = connect();

    $query = "
        SELECT c.id, c.comentario, u.nombre, u.apellido
        FROM comentarios c
        JOIN usuarios u ON c.usuario_id = u.id
        WHERE c.usuario_id = ?
        ORDER BY c.id DESC
    ";

    $stmt = $db->prepare($query);

    $stmt->bindParam(1, $usuario_id);

    if ($stmt->execute()) {

        $result = [
            "query" => true,
            "data"  => $stmt->fetchAll(PDO::FETCH_ASSOC)
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
