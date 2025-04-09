@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Nuevo Local</h1>
    <form action="{{ route('locales.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Local</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" required>
        </div>
        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono</label>
            <input type="text" class="form-control" id="telefono" name="telefono">
        </div>
        <div class="mb-3">
            <label for="horario" class="form-label">Horario</label>
            <input type="text" class="form-control" id="horario" name="horario">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="googlemaps" class="form-label">URL de Google Maps (opcional)</label>
            <input type="url" class="form-control" id="googlemaps" name="googlemaps">
        </div>
        <div class="mb-3">
            <label for="whatsapp" class="form-label">Número o URL de WhatsApp (opcional)</label>
            <input type="text" class="form-control" id="whatsapp" name="whatsapp">
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
        <!-- Campo para subir la imagen -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Local</button>
    </form>
</div>
@endsection
