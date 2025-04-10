@extends('layouts.landing')

@section('content')
<!-- Estilos específicos para la página "Nuestra Empresa" -->
<style>
    /* Título principal */
    .empresa-title {
         font-family: 'Montserrat', sans-serif;
         font-size: 2.75rem;
         font-weight: 700;
         color: #333;
         margin-bottom: 1.5rem;
         text-align: center;
         text-transform: uppercase;
         letter-spacing: 1px;
    }
    /* Imagen de la empresa */
    .empresa-image {
         border-radius: 8px;
         box-shadow: 0 4px 8px rgba(0,0,0,0.1);
         margin-bottom: 2rem;
         max-width: 90%;
    }
    /* Contenido general */
    .empresa-content {
         font-family: 'Open Sans', sans-serif;
         font-size: 1.125rem;
         line-height: 1.8;
         color: #555;
         margin-bottom: 2rem;
         text-align: justify;
    }
    /* Títulos de sección (Misión, Visión) */
    .empresa-section-title {
         font-family: 'Montserrat', sans-serif;
         font-size: 1.75rem;
         font-weight: 600;
         color: #DE276E; /* Color de acento */
         border-bottom: 2px solid #DE276E;
         padding-bottom: 0.5rem;
         margin-bottom: 1rem;
         text-transform: uppercase;
         letter-spacing: 0.5px;
    }
    /* Texto de misión y visión */
    .empresa-subcontent {
         font-family: 'Open Sans', sans-serif;
         font-size: 1.125rem;
         line-height: 1.8;
         color: #555;
         text-align: justify;
    }
</style>

<div class="container py-5">
    <h1 class="empresa-title">{{ $empresa->title }}</h1>

    @if($empresa->image)
        <div class="text-center">
            <img src="{{ asset('storage/' . $empresa->image) }}" alt="Imagen de Empresa" class="img-fluid empresa-image">
        </div>
    @endif

    <div class="empresa-content">
        {!! $empresa->content !!}
    </div>

    <div class="row">
        <div class="col-md-6">
            <h3 class="empresa-section-title">Misión</h3>
            <p class="empresa-subcontent">{!! $empresa->mission !!}</p>
        </div>
        <div class="col-md-6">
            <h3 class="empresa-section-title">Visión</h3>
            <p class="empresa-subcontent">{!! $empresa->vision !!}</p>
        </div>
    </div>
</div>
@endsection
