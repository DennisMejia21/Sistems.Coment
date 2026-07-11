<?php

require_once "../functions/comments_fx.php";
require_once "../functions/session_fx.php";
session_start();


if(isset($_POST['comentar'])) {
    $comentario = $_POST['comentario'];
    $usuario_id = $_SESSION['id'];

    $result = crearComentario($usuario_id, $comentario);
    if ($result["query"]) {

    header("Location: ../index.php");
    exit();

} else {

    echo "Error al crear comentario: " . $result["error"][2];

}
} else {
    echo "No se recibió ningún comentario";
}

