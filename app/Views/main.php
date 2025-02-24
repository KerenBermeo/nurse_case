<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenido, <?= htmlspecialchars($_SESSION['user']['name']) ?> 👋</h1>
        <nav>
            <ul>
                <li><a href="/dashboard">Inicio</a></li>
                <li><a href="/profile">Perfil</a></li>
                <li><a href="/logout">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Tu Panel de Usuario</h2>
        <p>Aquí puedes ver tu información y gestionar tu cuenta.</p>
    </main>
</body>
</html>

