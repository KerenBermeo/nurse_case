<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Bienvenido, <?= $_SESSION['user']['name'] ?? 'Invitado' ?></h1>
        <?php if (isset($_SESSION['user'])): ?>
            <a href="/logout">Cerrar Sesión</a>
        <?php else: ?>
            <a href="/login">Iniciar Sesión</a>
        <?php endif; ?>
    </header>
    <main>
        <p>Esta es la página de inicio de tu aplicación.</p>
    </main>
</body>
</html>
