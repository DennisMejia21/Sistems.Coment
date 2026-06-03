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
    <title>Register</title>
  </head>
  <body>
    <header>
      <h1>Registrarse</h1>
    </header>    
    <main>
      <div class="content">
        <div class="session-forms">
          <form action="scripts/session_scr.php" method="POST">
            <label for="nombre">Nombre: </label>
            <input type="text" name="nombre" id="nombre" maxlength="30" minlength="2" pattern="[a-zA-ZñÑáéíóú ]+" required title="Solo caracteres alfabeticos" >
            <br>
            <label for="apellido">Apellido: </label>
            <input type="text" name="apellido" id="apellido" maxlength="30" minlength="2" pattern="[a-zA-ZñÑáéíóú ]+" required title="Solo caracteres alfabeticos" >
            <br>
            <label for="email">Email: </label>
            <input type="email" name="email" id="email" required >
            <br>
            <label for="pass">Clave: </label>
            <input type="password" name="pass" id="pass" maxlength="20" minlength="6" pattern="[a-zA-Znñ0-9]+" required title="Solo caracteres alfanumericos" >
            <br><br>
            <button type="submit" name="register">Registrar</button>
          </form>
          <br><br>
          <a href="login.php">Login</a>
        </div>
      </div>
    </main>    
    <?php include_once "layouts/footer.php" ?>
  </body>
</html>