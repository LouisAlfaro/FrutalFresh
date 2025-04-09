@extends('layouts.landing')

@section('content')
<!-- Sección de Locales con Diseño Estilo "Walpa" -->
<section id="locales" class="py-5" style="background-color: var(--color-white);">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">Nuestros Locales</h2>
        @forelse($locales as $local)
            <div class="row g-4 align-items-center mb-5">
                <!-- Imagen del Local -->
                <div class="col-md-6">
                    @if($local->imagen)
                        <img src="{{ asset('storage/' . $local->imagen) }}" alt="{{ $local->nombre }}" 
                             class="img-fluid rounded shadow" style="width: 100%; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=Sin+Imagen" alt="Sin imagen"
                             class="img-fluid rounded shadow" style="width: 100%; object-fit: cover;">
                    @endif
                </div>
                <!-- Información del Local -->
                <div class="col-md-6">
                    <h3 class="mb-2 fw-bold">{{ $local->nombre }}</h3>
                    <p class="text-muted mb-1"><strong>Dirección:</strong> {{ $local->direccion }}</p>
                    <p class="text-muted mb-1"><strong>Teléfono:</strong> {{ $local->telefono }}</p>
                    <p class="text-muted mb-1"><strong>Horario:</strong> {{ $local->horario }}</p>
                    @if($local->descripcion)
                        <p class="text-muted">{{ $local->descripcion }}</p>
                    @endif

                    <!-- Botones de Acción -->
                    <div class="d-flex flex-wrap gap-2 mt-3">
                        @if($local->googlemaps)
                            <a href="{{ $local->googlemaps }}" target="_blank" 
                               class="btn btn-sm btn-outline-success fw-bold" 
                               style="border-radius: 50px;">
                                Google Maps
                            </a>
                        @endif
                        @if($local->whatsapp)
                            <a href="https://wa.me/{{ $local->whatsapp }}" target="_blank" 
                               class="btn btn-sm fw-bold" 
                               style="border-radius: 50px; background-color: #25D366; color: #fff;">
                                WhatsApp
                            </a>
                        @endif
                        <a href="{{ route('landing.carta') }}" class="btn btn-sm fw-bold" 
                           style="border-radius: 50px; background-color: var(--color-pink); color: #fff;">
                            Ver Carta
                        </a>
                        <a href="{{ route('landing.promociones') }}" class="btn btn-sm fw-bold" 
                           style="border-radius: 50px; background-color: var(--color-orange); color: #fff;">
                            Ver Promociones
                        </a>
                        @if($local->pdf_carta)
                            <a href="{{ asset('storage/' . $local->pdf_carta) }}" target="_blank" class="btn btn-sm fw-bold" 
                            style="border-radius: 50px; background-color: #007bff; color: #fff;">
                                Ver PDF Carta
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <p>No hay locales disponibles en este momento.</p>
            </div>
        @endforelse
    </div>
</section>
@endsection
