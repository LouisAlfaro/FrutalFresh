@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Editar Beneficio</h1>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Formulario para actualizar el beneficio usando el route 'work-benefits.update' -->
    <form action="{{ route('work-benefits.update', $benefit->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Título *</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $benefit->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea name="description" rows="3" class="form-control">{{ old('description', $benefit->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen (opcional)</label>
            <input type="file" name="image" class="form-control">
            @if($benefit->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $benefit->image) }}" alt="Imagen" style="max-width: 120px;">
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Orden (opcional)</label>
            <input type="number" name="order" class="form-control" value="{{ old('order', $benefit->order) }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
