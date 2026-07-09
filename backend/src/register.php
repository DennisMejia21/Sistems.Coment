<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>

<body>

    <h1>Crear cuenta</h1>

    <form action="scripts/seccion_scr.php" method="POST">

        <label>
            Nombre:
        </label>
        <input type="text" name="nombre" required>

        <br><br>

        <label>
            Apellido:
        </label>
        <input type="text" name="apellido" required>

        <br><br>

        <label>
            Contraseña:
        </label>
        <input type="password" name="password" required>

        <br><br>

        <button type="submit" name="register">
            Registrarse
        </button>

    </form>

</body>

</html>