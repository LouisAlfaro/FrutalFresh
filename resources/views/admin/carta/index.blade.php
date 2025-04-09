@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Listado de Ítems de Carta</h1>
    <a href="{{ route('carta.create') }}" class="btn btn-primary mb-3">Nuevo Ítem de Carta</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Local</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->local->nombre ?? 'Sin Local' }}</td>
                <td>{{ $item->nombre }}</td>
                <td>{{ $item->precio }}</td>
                <td>
                    <a href="{{ route('carta.edit', $item->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('carta.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Seguro?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
