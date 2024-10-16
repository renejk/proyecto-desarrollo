<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro de Usuario</title>
    <link rel="stylesheet" href="../../Css/Styles.css">
</head>

<body>
    <div>
        <h1>Registro de Usuario</h1>
        <form action="../../../Controllers/UserController.php" method="post">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" required>

            <label for="last_name">Apellido:</label>
            <input type="text" id="last_name" name="last_name" required>

            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Teléfono:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="role">Rol:</label>
            <select id="role" name="role" required>
                <option value="admin">Administrador</option>
                <option value="user">Usuario</option>
            </select>

            <label for="status">Estado:</label>
            <select id="status" name="status" required>
                <option value="active">Activo</option>
                <option value="inactive">Inactivo</option>
            </select>

            <button type="submit" name="action">Registrar</button>
        </form>
    </div>

    <span style="color: red"><?= @$_REQUEST['message'] ?></span>

</body>

</html>