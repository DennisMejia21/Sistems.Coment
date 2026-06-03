<aside>
  <b>User: </b><?php echo $_SESSION["user"] ?>
  <br>
  <b>Rol: </b><?php echo $_SESSION["rol"] ?>
  <br>
  <b>Email: </b><?php echo $_SESSION["email"] ?>
  <hr>
  <?php if ($_SESSION["rol_id"] === 1) : ?>
  <a href="/web/users/new.php">Nuevo usuario</a>
  <br>
  <a href="/web/users/">Listado de usuarios</a>
  <br>
  <?php endif ?>
</aside>