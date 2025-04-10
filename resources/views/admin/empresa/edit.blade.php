@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Editar Nuestra Empresa</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('empresa.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Título (opcional) -->
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" name="title" id="title" class="form-control"
                   value="{{ old('title', $empresa->title) }}">
        </div>

        <!-- Contenido general -->
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea name="content" id="content" class="form-control" rows="6">{{ old('content', $empresa->content) }}</textarea>
        </div>

        <!-- Imagen -->
        <div class="mb-3">
            <label for="image" class="form-label">Imagen (opcional)</label>
            <input type="file" name="image" id="image" class="form-control">
            @if($empresa->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $empresa->image) }}" alt="Imagen de Empresa" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <!-- Misión -->
        <div class="mb-3">
            <label for="mission" class="form-label">Misión</label>
            <textarea name="mission" id="mission" class="form-control" rows="4">{{ old('mission', $empresa->mission) }}</textarea>
        </div>

        <!-- Visión -->
        <div class="mb-3">
            <label for="vision" class="form-label">Visión</label>
            <textarea name="vision" id="vision" class="form-control" rows="4">{{ old('vision', $empresa->vision) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
