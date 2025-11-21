<?php
session_start();


$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// Validación de usuarios
if(($usuario !== "" && $password == "1234") ) {
    // Guardar usuario en sesión
    $_SESSION["usuario"] = $usuario;

        // Inicializar array de contadores si no existe
    if (!isset($_SESSION["contador"])) {
        $_SESSION["contador"] = [];
    }

    // Inicializar contador si no existe
    if (!isset($_SESSION["contador"][$usuario])) {
        $_SESSION["contador"][$usuario] = 0;
    }

    // Incrementar contador de inicios de sesión
    $_SESSION["contador"][$usuario]++;

    // Opcional: cookie para recordar usuario
    setcookie("usuario", $usuario, time() + 3600, "/");

    header("Location: bienvenido.php");
    exit();
} else {
    header("Location: index.php?error=1");
    exit();
}
?>
