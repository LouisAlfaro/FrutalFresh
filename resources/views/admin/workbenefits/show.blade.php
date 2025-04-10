@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>{{ $benefit->title }}</h1>
    <p>{{ $benefit->description }}</p>
    @if($benefit->image)
        <div>
            <img src="{{ asset('storage/' . $benefit->image) }}" alt="Imagen" style="max-width: 150px;">
        </div>
    @endif
    <p>Orden: {{ $benefit->order }}</p>
</div>
@endsection
