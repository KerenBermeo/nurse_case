<?php
// controllers/UserController.php
require_once __DIR__.'/../services/UserService.php';

class UserController {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    // Registro de usuario
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = $_POST['password'];

            $result = $this->userService->register($user);

            if ($result['success']) {
                echo json_encode(['message' => 'Usuario registrado correctamente.']);
            } else {
                http_response_code(400);
                echo json_encode(['errors' => $result['errors']]);
            }
        }
    }

    // Login de usuario
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $result = $this->userService->login($email, $password);

            if ($result['success']) {
                echo json_encode(['message' => 'Login exitoso.', 'user' => $result['user']]);
            } else {
                http_response_code(400);
                echo json_encode(['errors' => $result['errors']]);
            }
        }
    }
}
?>


