@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Configurar “Hagamos Negocios”</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('businessopportunitysetting.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Título (opcional)</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $setting->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Imagen (opcional)</label>
            <input type="file" name="image" class="form-control">
            @if($setting->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $setting->image) }}" alt="Imagen Oportunidad" style="max-width: 200px;">
                </div>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
