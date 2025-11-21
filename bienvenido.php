
<?php
session_start();
//var_dump($_SESSION);
//exit();
// Si no está logueado, redirige al login
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
/*
$contador = $_SESSION['contador'][$usuario] ?? 0;
$contador++;
$_SESSION['contador'][$usuario] = $contador;
*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login correcto</title>
</head>
<body>
    <h1>Login Correcto</h1>
    <p>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</p>
    <p>Has iniciado sesión <?php echo $_SESSION["contador"][$usuario]; ?> veces.</p>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>
