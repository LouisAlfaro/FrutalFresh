@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Configurar Texto de Reservas</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('reservationsetting.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Texto para "10 a 20 personas"</label>
            <input type="text" name="banner_10_20" class="form-control" value="{{ old('banner_10_20', $setting->banner_10_20) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Texto para "20 a 30 personas"</label>
            <input type="text" name="banner_20_30" class="form-control" value="{{ old('banner_20_30', $setting->banner_20_30) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Texto para "30 a más personas"</label>
            <input type="text" name="banner_30_plus" class="form-control" value="{{ old('banner_30_plus', $setting->banner_30_plus) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Título del Formulario</label>
            <input type="text" name="title_form" class="form-control" value="{{ old('title_form', $setting->title_form) }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
