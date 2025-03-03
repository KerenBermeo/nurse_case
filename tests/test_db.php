<?php
require_once __DIR__ . '/../core/Database.php';

$db = Database::getInstance()->getConnection(); // Obtener la instancia única de la conexión

try {
    $query = $db->query("SELECT 'Conexión exitosa' AS mensaje");
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    
    echo $result[0]['mensaje'] . PHP_EOL; // Debería mostrar: Conexión exitosa
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . PHP_EOL;
}
?>

