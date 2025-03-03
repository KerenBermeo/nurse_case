<?php 
require_once __DIR__.'/../core/Database.php';
require_once __DIR__.'/../Repositories/UserRepository.php';

class UserService {
    private UserRepository $userRepository;

    public function __construct(){
        $this->userRepository = new UserRepository();
    }

    // Registro de usuario
    public function register(User $user): array {
        $errors = $user->validate();

        if (count($errors)) {
            return ['success' => false, 'errors' => $errors];
        }

        // Verificar si el email ya está registrado
        if ($this->userRepository->findByEmail($user->email)) {
            $errors[] = "El correo electrónico ya está registrado.";
            return ['success' => false, 'errors' => $errors];
        }

        // Hash de la contraseña
        $user->password = password_hash($user->password, PASSWORD_BCRYPT);

        // Guardar el usuario en la base de datos
        $data = [
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password
        ];

        if ($this->userRepository->create($data)) {
            return ['success' => true];
        } else {
            return ['success' => false, 'errors' => ['Error al registrar el usuario.']];
        }
    }

    // Login de usuario
    public function login(string $email, string $password): array {
        $user = $this->userRepository->findByEmail($email);

        if (!$user) {
            return ['success' => false, 'errors' => ['El correo electrónico no está registrado.']];
        }

        if (!password_verify($password, $user['password'])) {
            return ['success' => false, 'errors' => ['La contraseña es incorrecta.']];
        }

        return ['success' => true, 'user' => $user];
    }
}

?>