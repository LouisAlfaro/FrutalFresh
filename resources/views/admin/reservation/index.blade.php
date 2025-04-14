@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1>Listado de Reservas</h1>

    <a href="{{ route('reservations.admin.export') }}" class="btn btn-success mb-3">
        Exportar CSV
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Sede</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Personas</th>
                <th>Tipo Contacto</th>
                <th>Contacto</th>
                <th>Motivo</th>
                <th>Mensaje</th>
                <th>Enviado</th>
    
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $r)
            <tr>
                <td>{{ $r->id }}</td>
                <td>{{ $r->sede }}</td>
                <td>{{ $r->fecha }}</td>
                <td>{{ $r->hora }}</td>
                <td>{{ $r->numero_personas }}</td>
                <td>{{ $r->tipo_contacto }}</td>
                <td>{{ $r->contacto }}</td>
                <td>{{ $r->motivo }}</td>
                <td>{{ $r->mensaje }}</td>
                <td>{{ $r->created_at->format('d/m/Y H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $reservations->links() }}
</div>
@endsection
