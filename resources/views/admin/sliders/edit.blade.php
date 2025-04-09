@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Slider</h1>
    <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="titulo" class="form-label">Título (opcional)</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $slider->titulo }}">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción (opcional)</label>
            <textarea class="form-control" id="descripcion" name="descripcion">{{ $slider->descripcion }}</textarea>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Cambiar Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            <div class="mt-2">
                <img src="{{ asset('storage/' . $slider->imagen) }}" alt="{{ $slider->titulo }}" class="img-thumbnail" width="150">
            </div>
        </div>
        <div class="mb-3">
            <label for="orden" class="form-label">Orden</label>
            <input type="number" class="form-control" id="orden" name="orden" value="{{ $slider->orden }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Slider</button>
    </form>
</div>
@endsection
