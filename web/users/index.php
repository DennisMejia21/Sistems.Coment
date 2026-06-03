<?php  
include_once "../session.php";
require_once "../functions/users_fx.php";
require_once "../functions/utils_fx.php";

$users = select_all();
#var_dump($users);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "../layouts/head.php" ?>
    <title>Listado de usuarios</title>
  </head>
  <body>
    <header>
      <h1>Listado de usuarios</h1>
    </header>
    <?php include_once "../layouts/nav.php" ?>
    <main>
      <?php include_once "../layouts/sidebar.php" ?>
      <div class="content">
        <table border="1">
          <thead>
            <tr>  			
              <th>Nombre Completo</th>
              <th>Email</th>
              <th>Rol</th>
              <th>Estado</th>
              <th>Fecha alta</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php users_rows($users["data"]) ?>
          </tbody>
        </table>
      </div>
    </main>
    <?php include_once "../layouts/footer.php" ?>
  </body>
</html>