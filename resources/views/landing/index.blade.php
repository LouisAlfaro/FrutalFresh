<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutal Juguería</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vite: Compilación de CSS y JS -->
    @vite(['resources/css/app.css'])
    <style>
        /* Paleta de Colores */
        :root {
            --color-green:  #89D631; /* Verde */
            --color-orange: #EF9B25; /* Naranja */
            --color-pink:   #DE276E; /* Rosa */
            --color-cyan:   #0094BC; /* Cian */
            --color-white:  #ffffff;
        }
        /* Base */
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-white);
        }
        /* Header y Navbar */
        header {
            background-color: var(--color-green); /* Fondo sólido */
        }
        .navbar {
            padding: 0.5rem 0; /* Reduce padding para minimizar espacio */
        }
        .navbar .navbar-brand img {
            max-height: 60px;
        }
        .navbar-nav .nav-link {
            color: var(--color-white) !important;
            font-weight: 500;
            margin-left: 1rem;
            transition: color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: var(--color-orange) !important;
        }
        /* Carrusel */
        #carrusel {
            margin: 0; /* Sin márgenes para pegarlo al header */
        }
        #carrusel .carousel-item img {
            object-fit: cover;
            width: 100%;
            max-height: 600px;
        }
        #carrusel .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 1rem;
            border-radius: 0.5rem;
        }
        /* Sección de Videos estilo “Comunidad Social” */
        #videos {
            padding: 2rem 0; /* Reduce margen vertical */
        }
        #videos h2 {
            color: var(--color-pink);
            font-weight: 700;
        }
        #videos .ratio {
            border: 2px solid #ddd;
        }
        #videos .btn-ver-mas {
            background-color: var(--color-orange);
            color: var(--color-white);
            border: none;
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s ease;
        }
        #videos .btn-ver-mas:hover {
            background-color: #d6741f;
        }
        /* Footer */
        footer.footer-custom {
            background-color: var(--color-orange);
            color: var(--color-white);
            padding: 1rem 0; /* Reduce padding para minimizar espacio */
            margin-top: 0;
        }
        footer.footer-custom p,
        footer.footer-custom small {
            margin: 0;
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
<header class="bg-green"> <!-- Asigna un fondo verde, ajusta en tu CSS si necesitas -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo / Marca -->
            <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.index') }}">
                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="max-height: 50px;">
                <!-- Opcional: texto al lado del logo -->
                <span class="ms-2 text-white fw-bold">Frutal Fresh</span>
            </a>

            <!-- Botón toggler para móviles -->
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces -->
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('landing.promociones') }}">Promociones</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('landing.carta') }}">Carta</a>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link text-white" href="{{ route('landing.locales') }}">Locales</a>
                    </li>
                </ul>
            </div>

            <!-- Botones a la derecha -->
            <div class="d-none d-lg-flex align-items-center">
                <!-- Ajusta el texto de los botones o su funcionalidad -->
                <a href="#" class="btn btn-outline-light me-2 fw-bold">Pedir Online</a>
                <a href="#" class="btn btn-pink fw-bold" style="background-color: var(--color-pink); color: #fff;">
                    Oportunidades
                </a>
            </div>
        </div>
    </nav>
</header>


    <!-- Carrusel Dinámico (Slider) -->
    @if(isset($sliders) && $sliders->count() > 0)
    <section id="carrusel" class="container-fluid px-0">
        <div id="carouselSlider" class="carousel slide shadow-sm" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach($sliders as $key => $slider)
                    <button type="button" data-bs-target="#carouselSlider" data-bs-slide-to="{{ $key }}" @if($key == 0) class="active" aria-current="true" @endif></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($sliders as $key => $slider)
                    <div class="carousel-item @if($key == 0) active @endif">
                        <img src="{{ asset('storage/' . $slider->imagen) }}" alt="{{ $slider->titulo }}">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slider->titulo }}</h5>
                            <p>{{ $slider->descripcion }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselSlider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselSlider" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </section>
    @else
        <p class="text-center text-white bg-danger py-3">No hay sliders disponibles.</p>
    @endif

    <!-- Sección de Videos estilo “Comunidad Social” Dinámico -->
    <section id="videos" class="py-5" style="background-color: var(--color-orange);">
        <div class="container">
            <h2 class="text-center text-white mb-4" style="font-weight: 700;">Comunidad Social</h2>
            <div class="row g-4 justify-content-center">
                @forelse($videos as $video)
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm" style="border-radius: 1rem;">
                            <div class="card-body text-center">
                                <!-- Logo o encabezado -->
                                <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="max-width: 50px;" class="mb-3" onerror="this.src='https://via.placeholder.com/50';">
                                <!-- Video local sin controles, en loop (simula un GIF) -->
                                <div class="ratio ratio-16x9 mb-3">
                                    <video autoplay loop muted playsinline style="border-radius: 0.5rem; width:100%; height:100%; object-fit:cover;">
                                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                        Tu navegador no soporta el elemento de video.
                                    </video>
                                </div>
                                <!-- Botón "Seguir" -->
                                <button class="btn" style="background-color: var(--color-pink); color: #fff; border-radius: 50px; padding: 0.5rem 1.5rem;">Seguir</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <p class="text-center text-white">No hay videos disponibles en este momento.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-custom">
        <div class="container text-center">
            <p class="mb-1">© {{ date('Y') }} Frutal Juguería — Todos los derechos reservados.</p>
            <small>Síguenos en redes sociales y visítanos en nuestras sucursales.</small>
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
