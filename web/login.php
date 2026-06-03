<?php 
/**
 * Si existe sesion iniciada no se 
 * permite acceder a los formularios 
 * de login y register
 */
session_start();

if (isset($_SESSION['user'])) {
  header('Location:/web/');
  exit();
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "layouts/head.php" ?>
    <title>Login</title>
  </head>
  <body>
    <header>
      <h1>Ingreso al sistema</h1>
    </header>
    <main>
      <div class="content">
        <div class="session-forms">
          <form action="scripts/session_scr.php" method="POST">
            <label for="user">User: </label>
            <input type="text" name="user" id="user">
            <br>
            <label for="pass">Pass: </label>
            <input type="password" name="pass" id="pass">
            <br>
            <button type="submit" name="login">Login</button>
          </form>
          <br>
          <a href="register.php">Registro</a>  
        </div>
      </div>
    </main>
    <?php include_once "layouts/footer.php" ?>
  </body>
</html>