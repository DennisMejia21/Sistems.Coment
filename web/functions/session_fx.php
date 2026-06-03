<?php

require_once "db_fx.php";

/**
 * Esta funcion recupera la informacion del usuario
 * utilizando el mail como filtro en la consulta
 * @param $email 
 */
function login($email) {
  $query = '
  SELECT CONCAT_WS(", ", users.name, users.last_name) AS "user"
    ,users.id AS "id"
    ,users.email AS "email"
    ,users.state AS "estado"
    ,users.pass AS "pass"
    ,users.role_id AS "rol_id"
    ,roles.role AS "rol"
  FROM users
    JOIN roles ON users.role_id = roles.id
  WHERE users.email = ?
  ';
  $db = connect();
  $stmt = $db->prepare($query);
  
  $stmt->bindParam(1, $email);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetch(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
}




