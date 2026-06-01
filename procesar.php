<?php
// Requerir el archivo de conexión
require 'conexion.php';

// Variables para manejar el mensaje que mostraremos en pantalla
$mensaje_estado = "";
$tipo_alerta = "";

// Comprobar que la solicitud provenga del formulario (POST)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Limpieza de datos
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validación
    if (!empty($nombre) && !empty($correo) && filter_var($correo, FILTER_VALIDATE_EMAIL) && !empty($mensaje)) {
        
        try {
            $sql = "INSERT INTO mensajes_contacto (nombre, correo, mensaje) VALUES (:nombre, :correo, :mensaje)";
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':correo', $correo);
            $stmt->bindParam(':mensaje', $mensaje);
            
            // Si se guarda en la base de datos con éxito...
            if ($stmt->execute()) {
                $mensaje_estado = "¡Excelente! Tu información ha sido enviada y registrada con éxito en la base de datos.";
                $tipo_alerta = "success";

                // ==========================================
                // NUEVO: LÓGICA PARA ENVIAR CORREO AL USUARIO
                // ==========================================
                $destinatario = $correo;
                $asunto = "Confirmacion de contacto - Portafolio Leonardo Sotomayor";
                
                // Construimos el cuerpo del mensaje
                $cuerpo_correo = "Hola " . $nombre . ",\n\n";
                $cuerpo_correo .= "Gracias por visitar mi portafolio web. Este es un mensaje automático para confirmar que he recibido tu información correctamente.\n\n";
                $cuerpo_correo .= "Mensaje que enviaste:\n";
                $cuerpo_correo .= "\"" . $mensaje . "\"\n\n";
                $cuerpo_correo .= "Me pondré en contacto contigo lo más pronto posible.\n\n";
                $cuerpo_correo .= "Saludos cordiales,\nLeonardo Sotomayor.\nEstudiante de TI";

                // Cabeceras (De quién viene el correo)
                // Nota: En un entorno real, cambia esto por el correo asociado a tu dominio
                $cabeceras = "From: contacto@leonardosotomayor.com\r\n";
                $cabeceras .= "Reply-To: no-reply@leonardosotomayor.com\r\n";
                $cabeceras .= "X-Mailer: PHP/" . phpversion();

                // Usamos @ antes de mail() para suprimir errores en pantalla si XAMPP/InfinityFree bloquean el servicio SMTP
                @mail($destinatario, $asunto, $cuerpo_correo, $cabeceras);
                // ==========================================

            } else {
                $mensaje_estado = "Hubo un problema interno al intentar guardar tu mensaje.";
                $tipo_alerta = "danger";
            }
        } catch (PDOException $e) {
            $mensaje_estado = "Error de conexión o base de datos: " . $e->getMessage();
            $tipo_alerta = "danger";
        }

    } else {
        $mensaje_estado = "Por favor, completa todos los campos correctamente. Verifica que el correo sea válido.";
        $tipo_alerta = "warning";
    }
} else {
    $mensaje_estado = "Acceso denegado. Debes enviar el formulario primero.";
    $tipo_alerta = "danger";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado del Envío | Portafolio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100">
    
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4 p-5">
                    
                    <?php if($tipo_alerta == 'success'): ?>
                        <div class="display-1 text-success mb-3">✓</div>
                        <h2 class="fw-bold text-success mb-3">¡Mensaje Enviado!</h2>
                    
                    <?php elseif($tipo_alerta == 'warning'): ?>
                        <div class="display-1 text-warning mb-3">⚠️</div>
                        <h2 class="fw-bold text-warning mb-3">Datos Incompletos</h2>
                    
                    <?php else: ?>
                        <div class="display-1 text-danger mb-3">✗</div>
                        <h2 class="fw-bold text-danger mb-3">Ocurrió un Error</h2>
                    <?php endif; ?>
                    
                    <p class="lead text-secondary mb-5"><?php echo $mensaje_estado; ?></p>
                    
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center">
                        <a href="index.php" class="btn btn-primary btn-lg px-4 shadow-sm">Volver al Inicio</a>
                        <a href="contacto.php" class="btn btn-outline-secondary btn-lg px-4 shadow-sm">Volver al Formulario</a>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>