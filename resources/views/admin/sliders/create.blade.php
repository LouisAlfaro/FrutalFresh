@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Nuevo Slider</h1>
    <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (opcional)</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Slider</label>
            <input type="file" class="form-control" id="imagen" name="imagen" required>
        </div>
        <div class="mb-3">
            <label for="orden" class="form-label">Orden (opcional)</label>
            <input type="number" class="form-control" id="orden" name="orden" value="0">
        </div>
        <button type="submit" class="btn btn-primary">Guardar Slider</button>
    </form>
</div>
@endsection
