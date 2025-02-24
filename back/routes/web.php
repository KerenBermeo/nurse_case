<?php
require_once __DIR__.'/../Controllers/UserController.php';

$userController = new UserController();

// Registro de usuario
if ($_SERVER['REQUEST_URI'] === '/register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->register();
}

// Login de usuario
if ($_SERVER['REQUEST_URI'] === '/login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userController->login();
}
?>
