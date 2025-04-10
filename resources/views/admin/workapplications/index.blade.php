@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Listado de Postulaciones</h1>

    <!-- Botón para Exportar CSV -->
    <a href="{{ route('workapplications.export') }}" class="btn btn-success mb-3">
        Exportar CSV
    </a>

    <table class="table table-bordered table-striped">
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
            @forelse($applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->sede }}</td>
                    <td>{{ $app->fecha }}</td>
                    <td>{{ $app->hora }}</td>
                    <td>{{ $app->numero_personas }}</td>
                    <td>{{ $app->tipo_contacto }}</td>
                    <td>{{ $app->contacto }}</td>
                    <td>{{ $app->motivo }}</td>
                    <td>{{ $app->mensaje }}</td>
                    <td>{{ $app->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No hay postulaciones registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Paginación -->
    <div class="d-flex justify-content-center">
        {{ $applications->links() }}
    </div>
</div>
@endsection
