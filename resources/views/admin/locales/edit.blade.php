@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Local</h1>
    <form action="{{ route('locales.update', $local->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Local</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $local->nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $local->direccion }}" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $local->telefono }}">
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario</label>
            <input type="text" class="form-control" id="horario" name="horario" value="{{ $local->horario }}">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $local->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="googlemaps" class="form-label">URL de Google Maps (opcional)</label>
            <input type="url" class="form-control" id="googlemaps" name="googlemaps" 
                   value="{{ $local->googlemaps }}">
        </div>
        <div class="mb-3">
            <label for="whatsapp" class="form-label">Número o URL de WhatsApp (opcional)</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp"
                   value="{{ $local->whatsapp }}">
        </div>
        <div class="mb-3">
            <label for="pdf_carta" class="form-label">PDF de la Carta (opcional)</label>
            <input type="file" class="form-control" id="pdf_carta" name="pdf_carta" accept="application/pdf">
            @if(isset($local) && $local->pdf_carta)
                <div class="mt-2">
                    <a href="{{ asset('storage/' . $local->pdf_carta) }}" target="_blank">Ver PDF Actual</a>
                </div>
            @endif
        </div>
        <!-- Mostrar imagen actual y opción de cambiarla -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            @if($local->imagen)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $local->imagen) }}" alt="Imagen actual" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Local</button>
    </form>
</div>
@endsection
