<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Portafolio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Leonardo Sotomayor</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1 d-flex justify-content-center align-items-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h4 class="mb-0 fw-bold">Formulario de Contacto</h4>
                </div>
                <div class="card-body p-4 p-md-5">
                    
                    <?php
                    // Validar si el script procesar.php envió un estado de retorno
                    if (isset($_GET['status'])) {
                        if ($_GET['status'] == 'success') {
                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <strong>¡Envío Exitoso!</strong> Tu mensaje ha sido registrado de forma segura en la base de datos.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                        } elseif ($_GET['status'] == 'error') {
                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <strong>Error en el proceso:</strong> No se pudo guardar la información. Por favor, verifica los campos.
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                  </div>";
                        }
                    }
                    ?>

                    <form action="procesar.php" method="POST">
                        <div class="mb-3">
                        <label for="nombre" class="form-label fw-bold text-secondary">Nombre Completo</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" 
                        required 
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+" 
                        title="Por favor, ingresa únicamente letras y espacios." 
                        placeholder="Ingresa tu nombre">
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-bold text-secondary">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required placeholder="ejemplo@correo.com">
                        </div>
                        
                        <div class="mb-4">
                            <label for="mensaje" class="form-label fw-bold text-secondary">Mensaje o Comentario</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="4" required placeholder="Escribe tu mensaje aquí..."></textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg fw-bold shadow-sm">Enviar Mensaje</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Leonardo Sotomayor | UTPL Actividad Académica</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>