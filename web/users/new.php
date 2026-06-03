<?php  
include_once "../session.php";
require_once "../functions/users_fx.php";
require_once "../functions/utils_fx.php";

$roles = select_rol();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "../layouts/head.php" ?>
    <title>Nuevo usuario</title>
  </head>
  <body>
    <header>
      <h1>Crear nuevo usuario</h1>
    </header>
    <?php include_once "../layouts/nav.php" ?>
    <main>
      <?php include_once "../layouts/sidebar.php" ?>
      <div class="content">
        <form action="../scripts/users_scr.php" method="POST">
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombre" id="nombre">
          <br>
          <label for="apellido">Apellido: </label>
          <input type="text" name="apellido" id="apellido">
          <br>
          <label for="email">Email: </label>
          <input type="email" name="email" id="email">
          <br>
          <label for="role">Role: </label>
          <select name="role" id="role">
            <option>-</option>
            <?php selects($roles["data"]) ?>
          </select>
          <br>
          <label for="pass">Calve: </label>
          <input type="password" name="pass" id="pass">
          <br>
          <br>
          <button type="submit" name="new_user">Submit</button>
        </form>
        <br>
        <a class="btn" href="/web/users/" >Volver</a>
      </div>
    </main>
    <?php include_once "../layouts/footer.php" ?>
  </body>
</html>
