@extends('layouts.landing')  {{-- Asegúrate de tener un layout para la parte pública, o usa layouts.app --}}

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Promociones</h1>
    <div class="row">
        @foreach($promociones as $promo)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($promo->imagen)
                        <img src="{{ asset('storage/' . $promo->imagen) }}" class="card-img-top" alt="{{ $promo->titulo }}">
                    @else
                        <img src="{{ asset('img/default-promo.jpg') }}" class="card-img-top" alt="Sin imagen">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $promo->titulo }}</h5>
                        <p class="card-text">{{ $promo->descripcion }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
