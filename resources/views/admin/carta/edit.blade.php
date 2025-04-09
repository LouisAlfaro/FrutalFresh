@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Editar Ítem de Carta</h1>
    <form action="{{ route('carta.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Selección del Local -->
        <div class="mb-3">
            <label for="local_id" class="form-label">Local</label>
            <select name="local_id" id="local_id" class="form-control" required>
                <option value="">Seleccione un local</option>
                @foreach($locals as $local)
                    <option value="{{ $local->id }}" {{ $item->local_id == $local->id ? 'selected' : '' }}>
                        {{ $local->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Nombre del Ítem -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Ítem</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $item->nombre }}" required>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control" value="{{ $item->precio }}">
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $item->descripcion }}</textarea>
        </div>

        <!-- Imagen (opcional) -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Ítem (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
            @if($item->imagen)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $item->imagen) }}" alt="Imagen actual" class="img-thumbnail" width="150">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Ítem</button>
    </form>
</div>
@endsection
