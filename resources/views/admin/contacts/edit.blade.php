@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Editar Contacto</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contacts.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="attention_hours" class="form-label">Horario de Atención</label>
            <input type="text" name="attention_hours" id="attention_hours" class="form-control"
                   value="{{ old('attention_hours', $contact->attention_hours) }}">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="text" name="phone" id="phone" class="form-control"
                   value="{{ old('phone', $contact->phone) }}">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input type="email" name="email" id="email" class="form-control"
                   value="{{ old('email', $contact->email) }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
