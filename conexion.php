<?php
$host = 'localhost';
$dbname = 'portafolio_db';
$username = 'root';
$password = ''; // Por defecto en XAMPP va vacío

try {
    // Conexión estándar (por defecto se conecta al puerto 3306 automáticamente)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    
    // Habilitar excepciones para capturar errores de manera eficiente
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Error crítico de conexión: " . $e->getMessage());
}
?>