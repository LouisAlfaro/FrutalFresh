@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Nueva Plataforma</h1>
    <form action="{{ route('delivery-links.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Nombre de la Plataforma</label>
            <input type="text" name="platform" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>URL</label>
            <input type="url" name="url" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Logo (opcional)</label>
            <input type="file" name="image" class="form-control">
        </div>
        <button class="btn btn-success">Guardar</button>
    </form>
</div>
@endsection
