<?php
class User {
    public int $id;
    public string $name;
    public string $email;
    public string $password;

    public function validate(): array {
        $errors = [];
        if (strlen($this->name) < 3) {
            $errors[] = "El nombre debe tener al menos 3 caracteres";
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "El correo electrónico no es válido.";
        }
        if (strlen($this->password) < 6) {
            $errors[] = "La contraseña debe tener al menos 6 caracteres.";
        }
        return $errors;
    }
}
?>
