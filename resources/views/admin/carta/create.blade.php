@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Crear Ítem de Carta</h1>
    <form action="{{ route('carta.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Selección del Local -->
        <div class="mb-3">
            <label for="local_id" class="form-label">Local</label>
            <select name="local_id" id="local_id" class="form-control" required>
                <option value="">Seleccione un local</option>
                @foreach($locals as $local)
                    <option value="{{ $local->id }}">{{ $local->nombre }}</option>
                @endforeach
            </select>
        </div>

        <!-- Nombre del Ítem -->
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Ítem</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>

        <!-- Precio -->
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio" id="precio" class="form-control">
        </div>

        <!-- Descripción -->
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
        </div>

        <!-- Imagen (opcional) -->
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen del Ítem (opcional)</label>
            <input type="file" name="imagen" id="imagen" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Ítem</button>
    </form>
</div>
@endsection
