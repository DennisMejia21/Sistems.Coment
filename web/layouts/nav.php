<nav>
  <a href="/web/" class="home-ico"><?php echo "\u{1F3E0}" ?></a> |
  <?php if ($_SESSION["rol_id"] === 1) : ?>
  <a href="/web/products/new.php" >Nuevo Producto</a> | 
  <?php endif ?>
  <a href="/web/products/" >Listado de Productos</a> |
  <a href="/web/logout.php" >Salir</a>
</nav>