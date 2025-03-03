<?php 
// run_migrations.php
require_once __DIR__.'/../core/Database.php';

$db = Database::getInstance()->getConnection();

// Leer el archivo SQL
$sql = file_get_contents(__DIR__.'/nurse_case.sql');

// Ejecutar el script SQL
try {
    $db->exec($sql);
    echo "Migraciones ejecutadas correctamente.\n";
} catch (PDOException $e) {
    echo "Error al ejecutar las migraciones: " . $e->getMessage() . "\n";
}

?>