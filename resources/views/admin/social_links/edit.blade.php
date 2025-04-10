@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Editar Enlaces de Redes Sociales</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('sociallinks.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="facebook" class="form-label">Facebook</label>
            <input type="text" name="facebook" id="facebook" class="form-control"
                   value="{{ old('facebook', $social->facebook) }}">
            <small class="text-muted">Ej: https://www.facebook.com/tu-pagina</small>
        </div>

        <div class="mb-3">
            <label for="instagram" class="form-label">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="form-control"
                   value="{{ old('instagram', $social->instagram) }}">
            <small class="text-muted">Ej: https://www.instagram.com/tu-cuenta</small>
        </div>

        <div class="mb-3">
            <label for="tiktok" class="form-label">TikTok</label>
            <input type="text" name="tiktok" id="tiktok" class="form-control"
                   value="{{ old('tiktok', $social->tiktok) }}">
            <small class="text-muted">Ej: https://www.tiktok.com/@tu-cuenta</small>
        </div>

        <div class="mb-3">
            <label for="x" class="form-label">X (Twitter)</label>
            <input type="text" name="x" id="x" class="form-control"
                   value="{{ old('x', $social->x) }}">
            <small class="text-muted">Ej: https://twitter.com/tu-cuenta</small>
        </div>

        <div class="mb-3">
            <label for="linkedin" class="form-label">LinkedIn</label>
            <input type="text" name="linkedin" id="linkedin" class="form-control"
                   value="{{ old('linkedin', $social->linkedin) }}">
            <small class="text-muted">Ej: https://www.linkedin.com/in/tu-cuenta</small>
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
