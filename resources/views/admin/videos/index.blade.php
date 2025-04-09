@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Listado de Videos</h1>
    <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">Nuevo Video</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Video</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->titulo }}</td>
                <td>
                    <!-- Mostrar un pequeño reproductor del video -->
                    <video width="150" controls>
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                        Tu navegador no soporta el elemento de video.
                    </video>
                </td>
                <td>
                    <a href="{{ route('videos.edit', $video->id) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('videos.destroy', $video->id) }}" method="POST" style="display:inline-block;">
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
