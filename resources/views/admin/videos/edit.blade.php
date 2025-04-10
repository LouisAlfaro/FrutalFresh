@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Video</h1>
    <form action="{{ route('videos.update', $video->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (opcional)</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $video->titulo }}">
        </div>
        <div class="mb-3">
            <label for="video" class="form-label">Subir Nuevo Video (opcional)</label>
            <input type="file" class="form-control" id="video" name="video">
            <small class="text-muted">Si no seleccionas un nuevo video, se conservará el actual.</small>
            <div class="mt-2">
                <video width="150" controls>
                    <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
            </div>
        </div>
        <div class="mb-3">
            <label for="thumbnail" class="form-label">Miniatura (opcional)</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            @if($video->thumbnail)
                <img src="{{ asset('storage/' . $video->thumbnail) }}" alt="Miniatura" class="img-thumbnail mt-2" width="150">
            @endif
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $video->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="link_red_social" class="form-label">Enlace a red social (opcional)</label>
            <input type="url" class="form-control" id="link_red_social" name="link_red_social" value="{{ old('link_red_social', $video->link_red_social) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Video</button>
    </form>
</div>
@endsection
