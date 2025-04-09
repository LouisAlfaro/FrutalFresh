@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Lista de Promociones</h1>
    <a href="{{ route('promociones.create') }}" class="btn btn-primary mb-3">Crear Nueva Promoción</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($promociones as $promocion)
            <tr>
                <td>{{ $promocion->id }}</td>
                <td>{{ $promocion->titulo }}</td>
                <td>{{ $promocion->fecha_inicio }}</td>
                <td>{{ $promocion->fecha_fin }}</td>
                <td>
                    <a href="{{ route('promociones.edit', $promocion->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('promociones.destroy', $promocion->id) }}" method="POST" style="display:inline-block;">
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
