<?php 

function login($username)
{
    $db = connect();

    $query = "
        SELECT *
        FROM usuarios
        WHERE username = ?
    ";

    $stmt = $db->prepare($query);

    $stmt->bindParam(1, $username);

    if ($stmt->execute()) {

        $result = [
            "query" => true,
            "rows"  => $stmt->rowCount(),
            "data"  => $stmt->fetch(PDO::FETCH_ASSOC)
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