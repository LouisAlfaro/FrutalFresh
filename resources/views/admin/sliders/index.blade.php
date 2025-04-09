@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Administrar Slider</h1>
    <a href="{{ route('sliders.create') }}" class="btn btn-primary mb-3">Nuevo Slider</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Imagen</th>
                <th>Orden</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td>{{ $slider->titulo }}</td>
                <td>
                    <img src="{{ asset('storage/' . $slider->imagen) }}" alt="{{ $slider->titulo }}" width="100">
                </td>
                <td>{{ $slider->orden }}</td>
                <td>
                    <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('sliders.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
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
