@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Listado de Beneficios</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('work-benefits.create') }}" class="btn btn-primary mb-3">
        Crear Nuevo Beneficio
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Orden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($benefits as $benefit)
                <tr>
                    <td>{{ $benefit->title }}</td>
                    <td>{{ $benefit->description }}</td>
                    <td>
                        @if($benefit->image)
                            <img src="{{ asset('storage/' . $benefit->image) }}" style="max-width: 100px;" alt="Imagen">
                        @endif
                    </td>
                    <td>{{ $benefit->order }}</td>
                    <td>
                        <!-- Asegúrate de usar work-benefits.edit -->
                        <a href="{{ route('work-benefits.edit', $benefit->id) }}" class="btn btn-sm btn-warning">
                            Editar
                        </a>
                        <form action="{{ route('work-benefits.destroy', $benefit->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar este beneficio?')">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="5" class="text-center">No hay beneficios registrados.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
