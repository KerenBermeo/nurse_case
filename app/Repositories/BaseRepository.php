<?php 
require_once __DIR__.'/../core/Database.php';

class BaseRepository {
    protected PDO $db;
    protected string $table;

    public function __construct(string $table)
    {
        $this->db = Database::getInstance()->getConnection();
        $this->table = $table;
    }

    public function findAll(): array {
        return $this->db->query("SELECT * FROM {$this->table}")->fetchAll();
    }

    public function findById(int $id):?array {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1"); # stmt guarda un objecto PDOStatement
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function creacte(array $data): bool {
        $colums = implode(',', array_keys($data));
        $placeholders = implode(',', array_map(fn($k) => ":$k", array_keys($data)));
        $stmt = $this->db->prepare("INSERT INTO {$this->table} ($colums) VALUES ($placeholders)");
        return $stmt->execute($data);
    }

    public function update(int $id, array $data): bool {
        $fields = implode(', ', array_map(fn($k) => "$k = :$k", array_keys($data)));
        $stmt =  $this->db->prepare("UPDATE {$this->table} SET $fields WHERE id = :id");
        $data['id'] = $id;
        return $stmt -> execute($data);
    }

    public function delecte(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

}

?>