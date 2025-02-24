<?php
require_once __DIR__.'/BaseRepository.php';

class UserRepository extends BaseRepository {
    public function __construct()
    {
        parent::__construct('users');
    }

    public function findByEmail(string $email): ?array {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch() ?: null;
    }
}
?>
