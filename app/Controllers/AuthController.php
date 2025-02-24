<?php
session_start();
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repositories/UserRepository.php';

class AuthController {
    private UserRepository $userRepo;

    public function __construct() {
        $this->userRepo = new UserRepository();
    }

    // REGISTRO DE USUARIO
    public function register(array $data): void {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = $data['password'];

        // Validar datos
        $errors = $user->validate();
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: /views/register.php");
            exit;
        }

        // Verificar si el correo ya existe
        if ($this->userRepo->findByEmail($user->email)) {
            $_SESSION['errors'] = ["El correo ya está registrado."];
            header("Location: /views/register.php");
            exit;
        }

        // Guardar usuario en la base de datos
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT); // Encriptar contraseña
        if ($this->userRepo->create($data)) {
            $_SESSION['success'] = "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: /views/login.php");
            exit;
        } else {
            $_SESSION['errors'] = ["Hubo un error al registrar el usuario."];
            header("Location: /views/register.php");
            exit;
        }
    }

    // LOGIN DE USUARIO
    public function login(array $data): void {
        $email = $data['email'];
        $password = $data['password'];

        // Buscar usuario por email
        $user = $this->userRepo->findByEmail($email);
        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['errors'] = ["Correo o contraseña incorrectos."];
            header("Location: /views/login.php");
            exit;
        }

        // Guardar usuario en sesión
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email']
        ];
        header("Location: /views/dashboard.php");
        exit;
    }

    // CERRAR SESIÓN
    public function logout(): void {
        session_destroy();
        header("Location: /views/login.php");
        exit;
    }
}

// Procesar formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $authController = new AuthController();

    if (isset($_POST['register'])) {
        $authController->register($_POST);
    }

    if (isset($_POST['login'])) {
        $authController->login($_POST);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {
    $authController = new AuthController();
    $authController->logout();
}
?>

