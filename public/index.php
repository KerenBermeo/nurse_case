<?php
require_once __DIR__ . '/../routes/web.php';

session_start();
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>
