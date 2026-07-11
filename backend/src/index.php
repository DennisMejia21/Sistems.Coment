<?php
require_once "session.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bienvenido <?php echo $_SESSION["username"]; ?> al sistema de comentarios</h1>

    <h2>Quieres realizar un comentario?</h2>
    <form action="scripts/comments_src.php" method="POST">
        <label for="comentario">Comentario:</label>
        <textarea id="comentario" name="comentario" required></textarea>
        <br><br>
        <button type="submit" name="comentar" >Comentar</button>
    </form>
    <a href="logout.php">Cerrar sesión</a>

    <h3>Comentarios realizados</h3>
    <?php
    require_once "functions/comments_fx.php";
    $result = obtenerComentarios();
   foreach ($result["data"] as $comentario): ?>
    <p>
        <strong><?= htmlspecialchars($comentario["username"]) ?></strong>:
        <?= htmlspecialchars($comentario["comentario"]) ?>
    </p>
<?php endforeach; ?>    
</body>
</html>