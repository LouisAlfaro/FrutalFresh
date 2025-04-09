@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Promoción</h1>
    <form action="{{ route('promociones.update', $promocion->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $promocion->titulo }}" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $promocion->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            @if($promocion->imagen)
                <img src="{{ asset('storage/' . $promocion->imagen) }}" alt="Imagen de promoción" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha Inicio</label>
            <input type="date" class="form-control" id="fecha_inicio" name="fecha_inicio" value="{{ $promocion->fecha_inicio }}">
        </div>
        <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha Fin</label>
            <input type="date" class="form-control" id="fecha_fin" name="fecha_fin" value="{{ $promocion->fecha_fin }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Promoción</button>
    </form>
</div>
@endsection
