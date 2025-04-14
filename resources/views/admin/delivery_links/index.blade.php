@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Plataformas de Pedido</h1>
    <a href="{{ route('delivery-links.create') }}" class="btn btn-success mb-3">Añadir Plataforma</a>

    @foreach($links as $link)
        <div class="card mb-2">
            <div class="card-body d-flex align-items-center">
                @if($link->image)
                    <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->platform }}" style="height:40px;" class="me-3">
                @endif
                <strong class="me-auto">{{ $link->platform }}</strong>
                <a href="{{ $link->url }}" class="btn btn-sm btn-primary me-2" target="_blank">Visitar</a>
                <a href="{{ route('delivery-links.edit', $link) }}" class="btn btn-sm btn-warning me-2">Editar</a>
                <form action="{{ route('delivery-links.destroy', $link) }}" method="POST" onsubmit="return confirm('¿Eliminar?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
