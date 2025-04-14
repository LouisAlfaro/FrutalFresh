@php
    use Illuminate\Support\Str;
@endphp
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Frutal Juguería</title>
    <link rel="icon" href="{{ asset('asset/img/faviconFrutal.png') }}" type="image/png">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Vite (opcional para tu proyecto) -->
    @vite(['resources/css/app.css'])
    <style>
        /* ======== Paleta de Colores ======== */
        :root {
            --color-green:  #85BA26; /* Verde Frutal */
            --color-orange: #EF9B25; /* Naranja Frutal */
            --color-pink:   #DE276E; /* Rosa Frutal */
            --color-cyan:   #0094BC; /* Cian Frutal */
            --color-white:  #ffffff; /* Blanco */
        }

        /* ======== RESET BÁSICO + ALTURA ======== */
        html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Para flex layout */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-white); /* Cambia este color si quieres evitar el blanco */
        }

        /* Layout con flex para pegar el footer al fondo */
        body {
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
        }

        /* ======== HEADER & NAVBAR ======== */
        header {
            background-color: var(--color-green);
            padding: 1rem 0;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        .navbar {
            padding: 0.5rem 0;
        }
        .navbar .navbar-brand img {
            max-height: 60px;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: var(--color-white) !important;
        }
        .navbar-nav .nav-link:hover {
            color: var(--color-pink) !important;
        }

        /* ======== CARRUSEL ======== */
        #carrusel {
            margin: 0; /* Quita margen extra */
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

        /* ======== SECCIÓN VIDEOS (COMUNIDAD SOCIAL) ======== */
        #videos {
            padding: 3rem 0;
            background-color: var(--color-orange);
        }
        #videos h2 {
            color: var(--color-white);
            font-weight: 700;
            margin-bottom: 2rem;
        }
        .card {
            border: none;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .btn-seguir {
            border-radius: 50px;
            padding: 0.5rem 1.5rem;
            color: var(--color-white);
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .btn-seguir:hover {
            transform: scale(1.05);
        }

        /* ======== FOOTER ======== */
        footer.footer-custom {
            background-color: var(--color-cyan);
            color: var(--color-white);
            padding: 1rem 0;
            text-align: center;
        }
        footer.footer-custom p,
        footer.footer-custom small {
            margin: 0;
        }
        footer.footer-custom a {
            color: var(--color-white);
            text-decoration: underline;
            transition: color 0.3s ease;
        }
        footer.footer-custom a:hover {
            color: var(--color-pink);
        }
        .footer-col {
            text-align: left;
        }
        .footer-col h5 {
            font-weight: bold;
        }
        .footer-col ul {
            list-style: none;
            padding: 0;
        }
        .footer-col ul li {
            margin-bottom: 5px;
        }
        /* Responsive Grid en Footer (1-2-4 columnas) */
        @media (max-width: 576px) {
            .footer-col {
                text-align: center;
            }
        }

        /* ======== Barra Fija de Redes Sociales ======== */
        .social-fixed {
            position: fixed;
            top: 50%;
            right: 10px; 
            transform: translateY(-50%);
            z-index: 9999;
        }
        .social-fixed a {
            display: block;
            margin-bottom: 10px;
        }
        /* Ocultar la barra en pantallas XS (opcional) */
        @media (max-width: 576px) {
            .social-fixed {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER / NAVBAR -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.index') }}">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="max-height: 50px;">
                    <span class="ms-2 text-white fw-bold">Frutal Fresh</span>
                </a>
                <!-- Botón toggler (móvil) -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Enlaces Centrales -->
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
                <!-- Botones Acción (desktop) -->
                <!-- Botones Acción (desktop) -->
@php
    use App\Models\DeliveryLink;
    $deliveryLinks = \App\Models\DeliveryLink::where('active', true)->get();
@endphp

<div class="d-none d-lg-flex align-items-center">
    <!-- Dropdown de Pedir Online -->
    <div class="dropdown me-2">
        <button class="btn btn-outline-light fw-bold dropdown-toggle" type="button" id="pedirOnlineDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            Pedir Online
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="pedirOnlineDropdown">
            @forelse($deliveryLinks as $link)
                <li>
                    <a class="dropdown-item d-flex align-items-center" href="{{ $link->url }}" target="_blank">
                        @if($link->image)
                            <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->platform }}" style="height: 24px;" class="me-2">
                        @endif
                        {{ $link->platform }}
                    </a>
                </li>
            @empty
                <li><span class="dropdown-item text-muted">No disponible</span></li>
            @endforelse
        </ul>
    </div>

    <!-- Botón de Oportunidades -->
    <a href="{{ route('workopportunity.index') }}" class="btn fw-bold"
       style="background-color: var(--color-pink); color: var(--color-white);">
       Oportunidades
    </a>
</div>

            </div>
        </nav>
    </header>

    <!-- Barra Fija de Redes Sociales -->
    <div class="social-fixed">
        @if(isset($socialLinks) && $socialLinks->facebook)
            <a href="{{ $socialLinks->facebook }}" target="_blank">
                <img src="{{ asset('asset/img/facebook.png') }}" alt="Facebook" style="width:40px;">
            </a>
        @endif
        @if(isset($socialLinks) && $socialLinks->instagram)
            <a href="{{ $socialLinks->instagram }}" target="_blank">
                <img src="{{ asset('asset/img/instagram.png') }}" alt="Instagram" style="width:40px;">
            </a>
        @endif
        @if(isset($socialLinks) && $socialLinks->tiktok)
            <a href="{{ $socialLinks->tiktok }}" target="_blank">
                <img src="{{ asset('asset/img/tik-tok.png') }}" alt="TikTok" style="width:40px;">
            </a>
        @endif
        @if(isset($socialLinks) && $socialLinks->x)
            <a href="{{ $socialLinks->x }}" target="_blank">
                <img src="{{ asset('asset/img/x.png') }}" alt="X" style="width:40px;">
            </a>
        @endif
        @if(isset($socialLinks) && $socialLinks->linkedin)
            <a href="{{ $socialLinks->linkedin }}" target="_blank">
                <img src="{{ asset('asset/img/linkedin.png') }}" alt="LinkedIn" style="width:40px;">
            </a>
        @endif
    </div>

    <!-- CONTENIDO VARIABLE -->
    <div class="main-content">
        <!-- CARRUSEL DINÁMICO -->
        @if(isset($sliders) && $sliders->count() > 0)
            <section id="carrusel" class="container-fluid px-0">
                <div id="carouselSlider" class="carousel slide shadow-sm" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        @foreach($sliders as $key => $slider)
                            <button type="button"
                                    data-bs-target="#carouselSlider"
                                    data-bs-slide-to="{{ $key }}"
                                    @if($key == 0) class="active" aria-current="true" @endif>
                            </button>
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

        <!-- SECCIÓN DE VIDEOS (COMUNIDAD SOCIAL) -->
        <section id="videos">
            <div class="container">
                <h2 class="text-center text-white">Comunidad Social</h2>
                <div class="row g-4 justify-content-center">
                    @forelse($videos as $video)
                        <div class="col-md-4">
                            <div class="card shadow-sm" style="border-radius: 1rem; overflow: hidden;">
                                <!-- Encabezado tipo "usuario" -->
                                <div class="d-flex align-items-center p-3 bg-white"
                                     style="border-bottom: 1px solid #ddd;">
                                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo"
                                         style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;"
                                         onerror="this.src='https://via.placeholder.com/50';">
                                    <div class="ms-3">
                                        <h6 class="mb-0 fw-bold">@frutalfresh</h6>
                                        <p class="mb-0 text-muted" style="font-size: 0.9rem;">Juguería & Snacks</p>
                                    </div>
                                </div>
                                <!-- Cuerpo: video en loop (simula un GIF) -->
                                <div class="bg-light"
                                     style="width: 100%; aspect-ratio: 1/1; position: relative;">
                                    <video autoplay loop muted playsinline
                                           style="object-fit: cover; width:100%; height:100%;">
                                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                                        Tu navegador no soporta el video.
                                    </video>
                                </div>
                                <!-- Pie: Botón "Seguir" -->
                                <div class="p-3 text-center bg-white" style="border-top: 1px solid #ddd;">
                                    @if($video->link_red_social)
                                        @php
                                            $url = $video->link_red_social;
                                            $btnColor = '#DE276E'; // Rosa por defecto
                                            $btnLabel = 'Seguir';
                                            if (Str::contains($url, 'instagram.com')) {
                                                $btnColor = '#DE276E';
                                                $btnLabel = 'Instagram';
                                            } elseif (Str::contains($url, 'facebook.com')) {
                                                $btnColor = '#3b5998';
                                                $btnLabel = 'Facebook';
                                            } elseif (Str::contains($url, 'tiktok.com')) {
                                                $btnColor = '#000000';
                                                $btnLabel = 'TikTok';
                                            }
                                        @endphp
                                        <a href="{{ $url }}" target="_blank" class="btn btn-seguir fw-bold"
                                           style="background-color: {{ $btnColor }}; color: var(--color-white);">
                                            {{ $btnLabel }}
                                        </a>
                                    @else
                                        <button class="btn btn-seguir fw-bold"
                                                style="background-color: #DE276E; color: var(--color-white);">
                                            Seguir
                                        </button>
                                    @endif
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
    </div>

    <!-- FOOTER -->
    @php
        // Si no se pasó $contact, usar valores por defecto
        $contact = $contact ?? (object)[
            'attention_hours' => '12:00 pm a 11:00 pm',
            'phone'           => '924 068 913',
            'email'           => 'jefecomercial@frutalfresh.com'
        ];
    @endphp
    <footer class="footer-custom border-top" style="background-color: var(--color-cyan);">
        <div class="container py-4">
            <div class="row text-center text-md-start">
                <!-- Columna 1: Marca Frutal Fresh -->
                <div class="col-12 col-sm-6 col-md-3 mb-3 footer-col">
                    <h5 class="fw-bold">Marca Frutal Fresh</h5>
                    <ul class="list-unstyled mt-2">
                        <li>
                            <a href="{{ route('landing.empresa') }}" class="text-white text-decoration-none">
                                Nuestra Empresa
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('landing.locales') }}" class="text-white text-decoration-none">
                                Locales
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Columna 2: Atención al Cliente -->
                <div class="col-12 col-sm-6 col-md-3 mb-3 footer-col">
                    <h5 class="fw-bold">Atención al Cliente</h5>
                    <ul class="list-unstyled mt-2">
                        <li>
                            <a href="{{ route('reservation.create') }}" class="text-white text-decoration-none">
                                Reservar
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Columna 3: Oportunidad! -->
                <div class="col-12 col-sm-6 col-md-3 mb-3 footer-col">
                    <h5 class="fw-bold">Oportunidad!</h5>
                    <ul class="list-unstyled mt-2">
                        <li>
                            <a href="{{ route('businessopportunity.index') }}" class="text-white text-decoration-none">
                                Hagamos Negocios
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('workopportunity.index') }}" class="text-white text-decoration-none">
                                Trabaja con Nosotros
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Columna 4: Contacto -->
                <div class="col-12 col-sm-6 col-md-3 mb-3 footer-col">
                    <h5 class="fw-bold">Contacto</h5>
                    <ul class="list-unstyled mt-2">
                        <li><span>Atención: </span>{{ $contact->attention_hours }}</li>
                        <li><span>Central Lima: </span>{{ $contact->phone }}</li>
                        <li>
                            <a href="mailto:{{ $contact->email }}" class="text-white text-decoration-none">
                                {{ $contact->email }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="text-center mt-3">
                <small>© {{ date('Y') }} Frutal Juguería — Todos los derechos reservados.</small>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
