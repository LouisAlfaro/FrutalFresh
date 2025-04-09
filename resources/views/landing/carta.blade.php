@extends('layouts.landing')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Carta por Local</h1>
    @foreach($carta as $localName => $items)
        <h2 class="mt-4">{{ $localName }}</h2>
        <div class="row">
            @foreach($items as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if($item->imagen)
                            <img src="{{ asset('storage/' . $item->imagen) }}" class="card-img-top" alt="{{ $item->nombre }}">
                        @else
                            <img src="https://via.placeholder.com/600x400?text=Sin+Imagen" class="card-img-top" alt="Sin imagen">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nombre }}</h5>
                            <p class="card-text"><strong>Precio:</strong> ${{ $item->precio }}</p>
                            <p class="card-text">{{ $item->descripcion }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
