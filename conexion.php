<?php
// Datos de InfinityFree
$host = 'sql302.infinityfree.com'; // El servidor que aparece en tu imagen
$dbname = 'if0_42065059_portafolio'; // Tu base de datos
$username = 'if0_42065059'; // Tu usuario 
$password = '3P4y9hF3VFBt5PG'; // Contraseña de InfinityFree

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}
?>