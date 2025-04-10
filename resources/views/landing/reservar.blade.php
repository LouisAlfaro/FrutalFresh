@extends('layouts.landing')

@section('content')
<div class="container py-4">
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Ejemplo de banners configurados -->
    <div class="row text-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <span class="badge bg-warning text-dark">RESERVA</span>
                    <h6 class="mt-2">
                        {{ $setting->banner_10_20 ?? '10 a 20 personas: Cotizar...' }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <span class="badge bg-warning text-dark">RESERVA</span>
                    <h6 class="mt-2">
                        {{ $setting->banner_20_30 ?? '20 a 30 personas: Cotizar...' }}
                    </h6>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <span class="badge bg-warning text-dark">RESERVA</span>
                    <h6 class="mt-2">
                        {{ $setting->banner_30_plus ?? '30 a más personas: Cotizar...' }}
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-secondary mb-4">Mostrar Menús</button>

    <h3 class="mb-3">{{ $setting->title_form ?? 'Elige cuando realizar tu reserva' }}</h3>

    <form action="{{ route('reservation.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="sede" class="form-label">Sede *</label>
            <input type="text" name="sede" id="sede" class="form-control" required value="{{ old('sede') }}">
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha *</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required value="{{ old('fecha') }}">
        </div>
        <div class="mb-3">
            <label for="hora" class="form-label">Hora *</label>
            <input type="time" name="hora" id="hora" class="form-control" required value="{{ old('hora') }}">
        </div>
        <div class="mb-3">
            <label for="numero_personas" class="form-label">Número de personas *</label>
            <input type="number" name="numero_personas" id="numero_personas" class="form-control" required value="{{ old('numero_personas') }}">
        </div>
        <div class="mb-3">
            <label for="tipo_contacto" class="form-label">Tipo de contacto *</label>
            <select name="tipo_contacto" id="tipo_contacto" class="form-select" required>
                <option value="Teléfono" {{ old('tipo_contacto') == 'Teléfono' ? 'selected' : '' }}>Teléfono</option>
                <option value="Email" {{ old('tipo_contacto') == 'Email' ? 'selected' : '' }}>Email</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="contacto" class="form-label">Contacto *</label>
            <input type="text" name="contacto" id="contacto" class="form-control" required value="{{ old('contacto') }}">
        </div>
        <div class="mb-3">
            <label for="motivo" class="form-label">Motivo (opcional)</label>
            <input type="text" name="motivo" id="motivo" class="form-control" value="{{ old('motivo') }}">
        </div>
        <div class="mb-3">
            <label for="mensaje" class="form-label">Mensaje (opcional)</label>
            <textarea name="mensaje" id="mensaje" rows="3" class="form-control">{{ old('mensaje') }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>
@endsection
