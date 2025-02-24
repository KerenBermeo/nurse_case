<?php
require_once __DIR__ . '/../core/Database.php';

$db = new Database();

try {
    $result = $db->query("SELECT 'Conexión exitosa' AS mensaje");
    echo $result[0]['mensaje'] . PHP_EOL; // Debería mostrar: Conexión exitosa
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
?>
