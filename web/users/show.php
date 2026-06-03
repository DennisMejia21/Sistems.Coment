<?php 
include_once "../session.php";
require_once "../functions/users_fx.php";

$user = user_by_id($_GET["user"]);
#var_dump($user);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "../layouts/head.php" ?>
    <title>Mostrar usuario</title>
  </head>
  <body>
    <header>
      <h1>Mostrar usuario</h1>
    </header>
    <?php include_once "../layouts/nav.php" ?>
    <main>
      <?php include_once "../layouts/sidebar.php" ?>
      <div class="content">
        <b>Nombre completo: </b><?php echo $user["data"]["nombre"]." ".$user["data"]["apellido"] ?>
        <br>
        <b>Email: </b><?php echo $user["data"]["email"] ?>
        <br>
        <b>Estado: </b><?php echo $user["data"]["estado"] ?>
        <br>
        <b>Rol: </b><?php echo $user["data"]["rol"] ?>
        <br>
        <b>Fecha de alta: </b><?php echo $user["data"]["fecha_alta"] ?>
        <br><br>
        <a class="btn" href="/web/users/" >Volver</a>
      </div>
    </main>
    <?php include_once "../layouts/footer.php" ?>
  </body>
</html>
