@extends('layouts.landing')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Oportunidad Comercial</h1>

    @if(session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!-- Mostrar la imagen editable de la configuración -->
    @if($setting && $setting->image)
        <div class="mb-4 text-center">
            <img src="{{ asset('storage/' . $setting->image) }}" alt="Oportunidad Comercial" class="img-fluid" style="max-width: 600px;">
        </div>
    @endif

    <!-- Formulario de aplicación -->
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="fw-bold text-center mb-3">Envía tu Solicitud</h3>
            <form action="{{ route('businessopportunity.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="empresa" class="form-label">Empresa *</label>
                    <input type="text" name="empresa" id="empresa" class="form-control" required value="{{ old('empresa') }}">
                </div>
                <div class="mb-3">
                    <label for="rubro" class="form-label">Rubro (opcional)</label>
                    <input type="text" name="rubro" id="rubro" class="form-control" value="{{ old('rubro') }}">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono (opcional)</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email (opcional)</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="region" class="form-label">Región (opcional)</label>
                    <input type="text" name="region" id="region" class="form-control" value="{{ old('region') }}">
                </div>
                <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia (opcional)</label>
                    <input type="text" name="provincia" id="provincia" class="form-control" value="{{ old('provincia') }}">
                </div>
                <div class="mb-3">
                    <label for="distrito" class="form-label">Distrito (opcional)</label>
                    <input type="text" name="distrito" id="distrito" class="form-control" value="{{ old('distrito') }}">
                </div>
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario (opcional)</label>
                    <textarea name="comentario" id="comentario" class="form-control" rows="3">{{ old('comentario') }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="attachment" class="form-label">Adjuntar Archivo (CV, opcional)</label>
                    <input type="file" name="attachment" id="attachment" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning w-100">Enviar Solicitud</button>
            </form>
        </div>
    </div>
</div>
@endsection
