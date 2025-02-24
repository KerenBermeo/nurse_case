<?php
require_once __DIR__ . '/../Repositories/UserRepository.php';

class AuthController {
    private UserRepository $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    public function showLoginForm() {
        require __DIR__ . '/../Views/auth/login.php';
    }

    public function showRegisterForm() {
        require __DIR__ . '/../Views/auth/register.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $this->userRepo->create(['name' => $name, 'email' => $email, 'password' => $password]);
            header('Location: /login');
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = $this->userRepo->findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session_start();
                $_SESSION['user'] = $user;
                header('Location: /');
            } else {
                echo "Credenciales incorrectas";
            }
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header('Location: /login');
    }
}
?>


