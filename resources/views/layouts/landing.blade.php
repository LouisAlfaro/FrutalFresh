@php
    use Illuminate\Support\Str;
@endphp
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
            --color-green:  #85BA26; /* Verde Frutal */
            --color-orange: #EF9B25; /* Naranja Frutal */
            --color-pink:   #DE276E; /* Rosa Frutal */
            --color-cyan:   #0094BC; /* Cian Frutal */
            --color-white:  #ffffff; /* Blanco */
        }
        html, body {
            margin: 0;
            padding: 0;
            height: 100%; /* Asegura que ocupen toda la altura */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--color-white);
        }
        /* Configuración Flex para que el footer se quede abajo */
        body {
            display: flex;
            flex-direction: column;
        }
        .main-content {
            flex: 1;
        }
        /* HEADER & NAVBAR */
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
        /* CARRUSEL */
        #carrusel {
            margin: 0;
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
        /* SECCIÓN DE VIDEOS (COMUNIDAD SOCIAL) */
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
        /* FOOTER */
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
        /* Responsive Grid para el footer */
        @media (max-width: 576px) {
            .footer-col {
                text-align: center;
            }
        }
        /* Barra Fija de Redes Sociales */
        .social-fixed {
            position: fixed;
            top: 50%;
            right: 10px;  /* O left:10px, según prefieras */
            transform: translateY(-50%);
            z-index: 9999;
        }
        .social-fixed a {
            display: block;
            margin-bottom: 10px;
        }
        /* Opcional: Ocultar la barra de redes en móviles muy pequeños */
        @media (max-width: 576px) {
            .social-fixed {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- HEADER -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <!-- Logo / Marca -->
                <a class="navbar-brand d-flex align-items-center" href="{{ route('landing.index') }}">
                    <img src="{{ asset('asset/img/logo.png') }}" alt="Logo" style="max-height: 50px;">
                    <span class="ms-2 text-white fw-bold">Frutal Fresh</span>
                </a>
                <!-- Botón toggler para móviles -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                <!-- Botones de Acción (solo en desktop) -->
                <div class="d-none d-lg-flex align-items-center">
                    <a href="#" class="btn btn-outline-light me-2 fw-bold">Pedir Online</a>
                    <a href="{{ route('workopportunity.index') }}" class="btn fw-bold" style="background-color: var(--color-pink); color: var(--color-white);">
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
      @yield('content')
    </div>
    
    <!-- FOOTER -->
    @php
        // Si $contact no existe, se asignan valores por defecto.
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
                    <h5>Marca Frutal Fresh</h5>
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
                    <h5>Atención al Cliente</h5>
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
                    <h5>Oportunidad!</h5>
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
                    <h5>Contacto</h5>
                    <ul class="list-unstyled mt-2">
                        <li>
                            <span>Atención: </span>{{ $contact->attention_hours }}
                        </li>
                        <li>
                            <span>Central Lima: </span>{{ $contact->phone }}
                        </li>
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
    
    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
