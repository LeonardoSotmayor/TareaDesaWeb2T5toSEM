<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio | Portafolio Personal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">Leonardo Javier Sotomayor Ojeda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5 flex-grow-1">
        
        <section class="row align-items-center bg-white p-4 p-md-5 rounded shadow-sm mb-5">
            <div class="col-md-4 text-center mb-4 mb-md-0">
               <img src="foto-perfil.jpg" alt="Foto de Leonardo Sotomayor" class="img-fluid rounded-circle border border-4 border-primary profile-img">
            </div>
            <div class="col-md-8">
                <h2 class="fw-bold text-secondary mb-3">Sobre mí</h2>
                <p class="lead">Hola, soy Leonardo Sotomayor, tengo 23 años y soy estudiante de Ingeniería en Tecnologías de la Información en la UTPL.</p>
                <p>Actualmente me desempeño como pasante en el área de Supply Chain. Me apasiona profundamente el desarrollo de software, la gestión de bases de datos y la optimización de hardware y sistemas informáticos.</p>
            </div>
        </section>

        <section class="mb-5">
            <h3 class="text-center fw-bold text-secondary mb-4">Mis Hobbies e Intereses</h3>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 dynamic-card">
                        <div class="card-body text-center">
                            <div class="fs-1 mb-2">🎮</div>
                            <h5 class="card-title fw-bold text-primary">Gaming & Hardware</h5>
                            <p class="card-text">Disfruto de los videojuegos en consolas de última generación y de configurar componentes de hardware para optimizar el rendimiento al máximo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 dynamic-card">
                        <div class="card-body text-center">
                            <div class="fs-1 mb-2">🎬</div>
                            <h5 class="card-title fw-bold text-primary">Cine & Series</h5>
                            <p class="card-text">Aficionado a las producciones cinematográficas de gran nivel y series icónicas de comedia y drama como <em>The Office</em> y <em>El Padrino</em>.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm border-0 dynamic-card">
                        <div class="card-body text-center">
                            <div class="fs-1 mb-2">☕</div>
                            <h5 class="card-title fw-bold text-primary">Café de Especialidad</h5>
                            <p class="card-text">Acompaño mis largas jornadas de programación y estudio universitario degustando un excelente café ecuatoriano de alta calidad.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <div class="container">
            <p class="mb-0">&copy; <?php echo date("Y"); ?> Leonardo Sotomayor | UTPL Actividad Académica</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>