<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutal Juguería</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        :root {
            --color-green:  #89D631;
            --color-orange: #EF9B25;
            --color-pink:   #DE276E;
            --color-cyan:   #0094BC;
            --color-white:  #ffffff;
        }
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-white);
        }
        /* Header */
        header {
            background-color: var(--color-green);
        }
        .navbar {
            padding: 0.5rem 0;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: var(--color-white) !important;
        }
        .navbar-nav .nav-link:hover {
            color: var(--color-orange) !important;
        }
        /* Footer */
        footer.footer-custom {
            background-color: var(--color-orange);
            color: var(--color-white);
            padding: 1rem 0;
        }
        footer.footer-custom a {
            color: var(--color-white);
            text-decoration: underline;
        }
        footer.footer-custom a:hover {
            color: var(--color-pink);
        }
    </style>
</head>
<body>
    <!-- Header / Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.index') }}">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="max-height:50px;">
                    <span class="ms-2 fw-bold">Frutal Fresh</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('landing.promociones') }}">Promociones</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('landing.carta') }}">Carta</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="{{ route('landing.locales') }}">Locales</a>
                        </li>
                    </ul>
                </div>
                <!-- Botones de Acción (solo en desktop) -->
                <div class="d-none d-lg-flex align-items-center">
                    <a href="#" class="btn btn-outline-light me-2 fw-bold">Pedir Online</a>
                    <a href="#" class="btn fw-bold" style="background-color: var(--color-pink); color: var(--color-white);">
                        Oportunidades
                    </a>
                </div>
            </div>
        </nav>
    </header>
    
    <!-- Contenido Variable -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer-custom border-top">
        <div class="container text-center">
            <p class="mb-0">© {{ date('Y') }} Frutal Juguería — Todos los derechos reservados.</p>
            <small>Síguenos en redes sociales y visítanos en nuestras sucursales.</small>
        </div>
    </footer>
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
