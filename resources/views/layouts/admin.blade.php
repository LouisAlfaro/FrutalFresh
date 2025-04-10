<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Admin - Frutal Juguería</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vite: Compilación de CSS y JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        /* Paleta de Colores */
        :root {
            --color-green:  #89D631;
            --color-orange: #EF9B25;
            --color-pink:   #DE276E;
            --color-cyan:   #0094BC;
        }
        body {
            background-color: #f8f9fa;
        }
        /* Sidebar personalizado */
        .sidebar {
            min-height: 100vh;
            background-color: var(--color-green) !important;
            color: #fff;
            padding: 1rem;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: var(--color-orange);
        }
        /* Área de contenido */
        .content {
            padding: 20px;
        }
        /* Navbar personalizado (usando color cian) */
        .navbar-custom {
            background-color: var(--color-cyan) !important;
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <!-- Logo y branding -->
            <div class="text-center mb-3">
                <a href="{{ url('/admin') }}">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo Frutal Fresh" class="img-fluid" style="max-height: 80px;">
                </a>
            </div>
            <div class="text-center mb-3">
                <!-- Se puede usar <span> si no se pretende que sea clicable -->
                <span class="fw-bold">Frutal Fresh</span>
            </div>
            <hr class="text-white">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/promociones') }}">Promociones</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/carta') }}">Carta</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/locales') }}">Locales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/videos') }}">Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/sliders') }}">Sliders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contacts.edit') }}">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('empresa.edit') }}">Nuestra Empresa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('reservations.admin.index') }}">Reservas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('work-benefits.index') }}">Beneficios (Trabajo)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('workapplications.index') }}">Postulaciones</a>
                </li>
            </ul>
        </div>
        <!-- Área de Contenido -->
        <div class="content flex-grow-1">
            <!-- Navbar Superior -->
            <nav class="navbar navbar-expand-lg navbar-custom shadow-sm">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('/') }}">Frutal Juguería</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <!-- Botón de logout -->
                        <a href="#" class="btn btn-outline-light"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </nav>
            <!-- Contenido específico -->
            <div class="container mt-4">
                @yield('content')
            </div>
        </div>
    </div>
    
    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
