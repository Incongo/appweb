<?php
// ----------------------------
// INICIO DE SESIÓN
// ----------------------------
session_start();

// Si ya existe la variable de sesión "usuario", redirige a bienvenido.php
if (isset($_SESSION['usuario'])) {
    header("Location: bienvenido.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <title>Formularios</title>
</head>

<body>
    <div class="formulario-container">
        <h1>🕹️ Login 🕹️</h1>
        <form id="registroForm" action="procesar_login.php" method="post">
            <div></div>

            <label for="usuario">Usuario
                <input type="text" name="usuario" id="usuario" placeholder="Usuario / Email" required>
            </label>

            <label for="contraseña">Contraseña
                <input type="password" name="password" id="pass1" placeholder="contraseña" required>
            </label>

            <p id="mensaje">
                <?php
                if (isset($_GET['error']) && $_GET['error'] == 1) {
                    echo "Usuario o contraseña incorrectos";
                }
                ?>
            </p>
            <input type="submit" name="accion" value="Entrar">
            <input type="submit" name="accion" value="Registrarse">

        </form>
        <script src="scripto.js"></script>
    </div>
</body>

</html>