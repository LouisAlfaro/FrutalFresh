@php
    use Illuminate\Support\Str;
@endphp

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
                <th>Red Social</th> <!-- Nueva columna -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>{{ $video->id }}</td>
                <td>{{ $video->titulo }}</td>
                <td>
                    <!-- Pequeño reproductor del video -->
                    <video width="150" controls>
                        <source src="{{ asset('storage/' . $video->video) }}" type="video/mp4">
                        Tu navegador no soporta el elemento de video.
                    </video>
                </td>
                <td>
                    @if($video->link_red_social)
                        @php
                            $url = $video->link_red_social;
                            $color = 'secondary';
                            $label = 'Seguir';

                            if (Str::contains($url, 'instagram.com')) {
                                $color = 'danger';  // Rojo/rosa
                                $label = 'Instagram';
                            } elseif (Str::contains($url, 'facebook.com')) {
                                $color = 'primary'; // Azul
                                $label = 'Facebook';
                            } elseif (Str::contains($url, 'tiktok.com')) {
                                $color = 'dark';    // Oscuro
                                $label = 'TikTok';
                            }
                        @endphp
                        <a href="{{ $url }}" target="_blank" class="btn btn-sm btn-{{ $color }}">
                            {{ $label }}
                        </a>
                    @else
                        <span class="text-muted">No asignado</span>
                    @endif
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
