<?php include_once "../session.php" ?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <?php include_once "../layouts/head.php" ?>
    <title>Productos</title>
  </head>
  <body>
    <header>
      <h1>Productos</h1>
    </header>
    <?php include_once "../layouts/nav.php" ?>
    <main>
      <?php include_once "../layouts/sidebar.php" ?>
      <div class="content">
        <table>
          <thead>
            <tr>
              <th>Producto</th>
              <th>Precio</th>
              <th>Categoria</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </main>
    <?php include_once "../layouts/footer.php" ?>
  </body>
</html>