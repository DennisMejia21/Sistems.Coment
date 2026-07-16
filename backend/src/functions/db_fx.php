<?php
function connect()
{
    try {

        $db = new PDO(
            "mysql:host=mysql;dbname=sistema_comentarios",
            "dennis",
            "123456"
        );

        return $db;

    } catch (PDOException $e) {

        echo "No se pudo conectar a la base de datos :(.";

    }
}