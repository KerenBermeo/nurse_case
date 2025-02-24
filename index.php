<?php
require_once __DIR__.'/back/routes/web.php';

// Obtener la ruta solicitada
$requestUri = $_SERVER['REQUEST_URI'];

// Enrutamiento básico
switch ($requestUri) {
    case '/':
        require __DIR__.'/views/home.php';
        break;
    case '/login':
        require __DIR__.'/views/login.php';
        break;
    case '/register':
        require __DIR__.'/views/register.php';
        break;
    default:
        http_response_code(404);
        echo "Página no encontrada.";
        break;
}
?>
