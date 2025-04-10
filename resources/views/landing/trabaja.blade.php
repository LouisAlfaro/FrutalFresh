@extends('layouts.landing')

@section('content')
<div class="container py-5">
    <h2 class="text-center fw-bold mb-4">Trabaja con nosotros</h2>

    <!-- Sección de Beneficios -->
    <div class="row mb-5">
        @foreach($benefits as $benefit)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    @if($benefit->image)
                        <img src="{{ asset('storage/' . $benefit->image) }}" class="card-img-top" alt="{{ $benefit->title }}">
                    @endif
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $benefit->title }}</h5>
                        <p class="card-text">{{ $benefit->description }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Formulario de Postulación -->
    <div class="mb-4">
        <h3 class="fw-bold mb-3">Aplica ahora</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('workopportunity.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Nombre *</label>
                    <input type="text" name="nombre" class="form-control" required value="{{ old('nombre') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Especialidad *</label>
                    <input type="text" name="especialidad" class="form-control" required value="{{ old('especialidad') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label fw-bold">Teléfono (opcional)</label>
                    <input type="text" name="telefono" class="form-control" value="{{ old('telefono') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label fw-bold">Email (opcional)</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Región (opcional)</label>
                <input type="text" name="region" class="form-control" value="{{ old('region') }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Experiencia (opcional)</label>
                <textarea name="experiencia" class="form-control" rows="3">{{ old('experiencia') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Comentario (opcional)</label>
                <textarea name="comentario" class="form-control" rows="2">{{ old('comentario') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Adjuntar archivo (CV) (opcional)</label>
                <input type="file" name="attachment" class="form-control">
            </div>

            <button type="submit" class="btn btn-warning fw-bold">Enviar</button>
        </form>
    </div>
</div>
@endsection
