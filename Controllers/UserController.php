<?php
// controllers/UserController.php
require_once __DIR__.'/../Services/UserServices.php';

class UserController {
    private UserService $userService;

    public function __construct() {
        $this->userService = new UserService();
    }

    // Registro de usuario
    public function register(array $data) {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        $result = $this->userService->register($user);

        if ($result['success']) {
            echo json_encode(['message' => 'Usuario registrado correctamente.']);
        } else {
            http_response_code(400);
            echo json_encode(['errors' => $result['errors']]);
        }
    }

    // Login de usuario
    public function login(array $data) {
        $email = $data['email'];
        $password = $data['password'];

        $result = $this->userService->login($email, $password);

        if ($result['success']) {
            echo json_encode(['message' => 'Login exitoso.', 'user' => $result['user']]);
        } else {
            http_response_code(400);
            echo json_encode(['errors' => $result['errors']]);
        }
    }
}
?>


