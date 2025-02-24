<?php
require_once __DIR__ . '/../core/Router.php';

$router = new Router();

// Página de inicio
$router->get('/', ['HomeController', 'index']);

// Autenticación
$router->get('/login', ['AuthController', 'showLoginForm']);
$router->post('/login', ['AuthController', 'login']);
$router->get('/register', ['AuthController', 'showRegisterForm']);
$router->post('/register', ['AuthController', 'register']);
$router->get('/logout', ['AuthController', 'logout']);

return $router;
?>
