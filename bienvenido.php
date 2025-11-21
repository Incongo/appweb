<?php
session_start();

// Si no está logueado, redirige al login
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION['usuario'];
$contadores = $_SESSION['contador'] ?? [];

if (isset($_GET['borrarusuario'])) {
    $borrarusuario = $_GET['borrarusuario'];
    // Eliminar usuario del array de contadores si existe
    if (isset($contadores[$borrarusuario])) {
        unset($contadores[$borrarusuario]);
        // Actualizar la sesión
        $_SESSION['contador'] = $contadores;
    }
    // Redirigir para evitar resubmisión
    header("Location: bienvenido.php");
    exit();
}


//var_dump($_SESSION); ver lo que hay en la sesión
//exit(); para que no continue




?>
<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="bienvenido.css" />
    <meta charset="UTF-8">
    <title>Login correcto</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            border: 2px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background: #eee;
        }

        .btn-depurar {
            background: red;
            color: white;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <h1>Login Correcto</h1>

    <p>Bienvenido, <?php echo htmlspecialchars($usuario); ?>!</p>

    <h2>Todos los usuarios:</h2>
    <table>
        <tbody>
            <tr>
                <th>Usuario</th>
                <th>Inicios de sesión</th>
                <th>Editar</th>
            </tr>
            <?php foreach ($contadores as $user => $count): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user); ?></td>
                    <td><?php echo $count; ?></td>

                    <td>
                        <a class="btn-depurar"
                            href="bienvenido.php?borrarusuario=<?php echo urlencode($user); ?>">Borrar</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="logout.php">Cerrar sesión</a>

</body>

</html>