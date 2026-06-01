<?php
// 1. SISTEMA DE SEGURIDAD BÁSICO
// Cambia "ProfeUTPL" por la contraseña que le quieras dar a tu profesora
$clave_correcta = "ProfeUTPL";

// Verificamos si la clave en la URL es correcta
if (!isset($_GET['clave']) || $_GET['clave'] !== $clave_correcta) {
    die("
    <div style='font-family: Arial; text-align: center; margin-top: 50px;'>
        <h2 style='color: red;'>Acceso Denegado</h2>
        <p>No tienes permiso para ver esta página.</p>
    </div>");
}

// 2. CONEXIÓN A LA BASE DE DATOS
require 'conexion.php';

// 3. OBTENER LOS DATOS
try {
    // Hacemos la consulta para traer todos los mensajes ordenados por fecha
    $sql = "SELECT * FROM mensajes_contacto ORDER BY fecha DESC";
    $stmt = $pdo->query($sql);
    $mensajes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al consultar la base de datos: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Registros | Validación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-4">

    <div class="container">
        <div class="card shadow border-0 rounded-3">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center py-3">
                <h4 class="mb-0">Registros de la Base de Datos</h4>
                <span class="badge bg-primary">Validación Académica</span>
            </div>
            
            <div class="card-body">
                <p class="text-secondary">Esta tabla muestra los datos extraídos en tiempo real de la tabla <code>mensajes_contacto</code>.</p>
                
                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Fecha y Hora</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Mensaje</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($mensajes) > 0): ?>
                                <?php foreach ($mensajes as $fila): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($fila['id']); ?></td>
                                        <td><?php echo htmlspecialchars($fila['fecha']); ?></td>
                                        <td><strong><?php echo htmlspecialchars($fila['nombre']); ?></strong></td>
                                        <td><a href="mailto:<?php echo htmlspecialchars($fila['correo']); ?>"><?php echo htmlspecialchars($fila['correo']); ?></a></td>
                                        <td><?php echo nl2br(htmlspecialchars($fila['mensaje'])); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Aún no hay mensajes registrados en la base de datos.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</body>
</html>