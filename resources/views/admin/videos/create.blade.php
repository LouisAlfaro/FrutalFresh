@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Nuevo Video</h1>
    <form action="{{ route('videos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (opcional)</label>
            <input type="text" class="form-control" id="titulo" name="titulo">
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Subir Video</label>
            <input type="file" class="form-control" id="video" name="video" required>
            <small class="text-muted">Formatos aceptados: mp4, avi, mov, wmv</small>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Miniatura (opcional)</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="descripcion" name="descripcion"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Video</button>
    </form>
</div>
@endsection
