@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Listado de Locales</h1>
    <a href="{{ route('locales.create') }}" class="btn btn-primary mb-3">Nuevo Local</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Horario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locales as $local)
            <tr>
                <td>{{ $local->id }}</td>
                <td>
                    @if($local->imagen)
                        <img src="{{ asset('storage/' . $local->imagen) }}" alt="{{ $local->nombre }}" width="100">
                    @else
                        <img src="https://via.placeholder.com/100x70?text=Sin+Imagen" alt="Sin imagen">
                    @endif
                </td>
                <td>{{ $local->nombre }}</td>
                <td>{{ $local->direccion }}</td>
                <td>{{ $local->telefono }}</td>
                <td>{{ $local->horario }}</td>
                <td>
                    <a href="{{ route('locales.edit', $local->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('locales.destroy', $local->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
