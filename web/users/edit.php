<?php  
include_once "../session.php";
require_once "../functions/users_fx.php";
require_once "../functions/utils_fx.php";

$roles = select_rol();
$user = user_by_id($_GET["user"]);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "../layouts/head.php" ?>
    <title>Actualizar usuario</title>
  </head>
  <body>
    <header>
      <h1>Actualizar usuario</h1>
    </header>
    <?php include_once "../layouts/nav.php" ?>
    <main>
      <?php include_once "../layouts/sidebar.php" ?>
      <div class="content">
        <form action="../scripts/users_scr.php" method="POST">
          <label for="nombre">Nombre: </label>
          <input type="text" name="nombre" id="nombre" value="<?php echo $user["data"]["nombre"] ?>">
          <br>
          <label for="apellido">Apellido: </label>
          <input type="text" name="apellido" id="apellido" value="<?php echo $user["data"]["apellido"] ?>">
          <br>
          <label for="email">Email: </label>
          <input type="email" name="email" id="email" value="<?php echo $user["data"]["email"] ?>">
          <br>
          <label for="role">Role: </label>
          <select name="role" id="role">            
            <option value="<?php echo $user["data"]["role_id"] ?>"><?php echo $user["data"]["rol"] ?></option>
            <option>-</option>
            <?php selects($roles["data"]) ?>
          </select>
          <input type="hidden" name="id" value="<?php echo $_GET['user'] ?>">  
          <br>
          <br>
          <button type="submit" name="update_user">Submit</button>
        </form>
        <br>
        <a class="btn" href="/web/users/" >Volver</a>
      </div>
    </main>
    <?php include_once "../layouts/footer.php" ?>
  </body>
</html>
