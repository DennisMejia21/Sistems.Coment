<?php  
declare(strict_types=1);
/**
 * Este archivo debe contener las sentencias SQL para 
 * realizar las operaciones CRUD sobre los usuarios
 */
require_once "db_fx.php";

/**
 * Esta funcion recupera la informacion de los roles
 * para el formulario de nuevo usuario que solo ve el 
 * admin, cumple con los indices "value" y "option"
 * @return array
 */
function select_rol(): array {
  $query = 'SELECT id AS "value", role AS "option" FROM roles';
  
  $db = connect();
  $stmt = $db->prepare($query);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
}

/**
 * Esta funcion lista a todos los usuarios
 * @return array
 */
function select_all(): array {
  $query = '
  SELECT CONCAT_WS(", ", users.name, users.last_name) AS "user"
    ,users.id AS "id"
    ,users.email AS "email"
    ,users.create_at AS "fecha_alta"
    ,users.state AS "estado"
    ,roles.role AS "rol"
    ,roles.id AS "role_id"
  FROM users
    JOIN roles ON users.role_id = roles.id
  ';
  
  $db = connect();
  $stmt = $db->prepare($query);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
}

/**
 * Esta funcion busca a un usuario por su id
 * @param $id int
 * @return array
 */
function user_by_id(int $id): array {
  $query = '
  SELECT users.name AS "nombre"
    ,users.last_name AS "apellido"
    ,users.id AS "id"
    ,users.email AS "email"
    ,users.create_at AS "fecha_alta"
    ,users.state AS "estado"
    ,roles.role AS "rol"
    ,roles.id AS "role_id"
  FROM users
    JOIN roles ON users.role_id = roles.id
  WHERE users.id = ?
  ';
  
  $db = connect();
  $stmt = $db->prepare($query);
  $stmt->bindParam(1, $id);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetch(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
}

/**
 * Esta funcion recibe los datos ya validados para insertar en la base
 * @param $data | array 
 * @return array
 */
function insert(array $data): array {
  $query = "INSERT INTO users (name, last_name, email, role_id, pass) VALUES (?,?,?,?,?)";
  
  $db = connect();
  $stmt = $db->prepare($query);
  
  $stmt->bindParam(1, $data["nombre"], PDO::PARAM_STR);
  $stmt->bindParam(2, $data["apellido"], PDO::PARAM_STR);
  $stmt->bindParam(3, $data["email"], PDO::PARAM_STR);
  $stmt->bindParam(4, $data["rol_id"], PDO::PARAM_INT);
  $stmt->bindParam(5, $data["pass"], PDO::PARAM_STR);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
  
}

/**
 * Esta funcion recibe los datos ya validados para insertar en la base
 * @param $data | array 
 * @return array
 */
function update(array $data): array {
  $query = "
  UPDATE users SET name = ?
    ,last_name = ?
    ,email = ?
    ,role_id = ?
  WHERE id = ? 
  ";
  
  $db = connect();
  $stmt = $db->prepare($query);
  
  $stmt->bindParam(1, $data["nombre"], PDO::PARAM_STR);
  $stmt->bindParam(2, $data["apellido"], PDO::PARAM_STR);
  $stmt->bindParam(3, $data["email"], PDO::PARAM_STR);
  $stmt->bindParam(4, $data["rol_id"], PDO::PARAM_INT);
  $stmt->bindParam(5, $data["id"], PDO::PARAM_STR);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
  
}

/**
 * Esta funcion recibe el id del usuario a borrar
 * @param $id | int 
 * @return array
 */
function kill(int $id): array {
  $query = "DELETE FROM users WHERE id = ?";
  
  $db = connect();
  $stmt = $db->prepare($query);
  
  $stmt->bindParam(1, $id, PDO::PARAM_INT);
  
  if ($stmt->execute()) {
    $result = ["query" => true , "rows" => $stmt->rowCount(), "data" => $stmt->fetchAll(PDO::FETCH_ASSOC)];
    return $result;
  } else {
    $result = ["query" => false, "error" => $stmt->errorInfo()];
    return $result;
  }
  
}