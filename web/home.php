<?php include_once "session.php" ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "layouts/head.php" ?>
    <title>Home</title>
  </head>
  <body>
    <header>
      <h1>Bienvenido</h1>
    </header>
    <?php include_once "layouts/nav.php" ?>
    <main>
      <?php include_once "layouts/sidebar.php" ?>
      <div class="content">
        <h3>Contenido principal</h3>
      </div>
    </main>
    <?php include_once "layouts/footer.php" ?>
    <?php include_once "layouts/scripts.php" ?>
  </body>
</html>
