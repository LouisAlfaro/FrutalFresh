@extends('layouts.admin')

@section('content')
<div class="container my-4">
    <h1 class="mb-4">Listado de Oportunidades Comerciales</h1>
    
    <!-- Botón para Exportar CSV -->
    <a href="{{ route('businessopportunityapplications.export') }}" class="btn btn-success mb-3">
        Exportar CSV
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empresa</th>
                <th>Rubro</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Región</th>
                <th>Provincia</th>
                <th>Distrito</th>
                <th>Comentario</th>
                <th>Adjunto</th>
                <th>Enviado</th>
            </tr>
        </thead>
        <tbody>
            @forelse($applications as $app)
                <tr>
                    <td>{{ $app->id }}</td>
                    <td>{{ $app->empresa }}</td>
                    <td>{{ $app->rubro }}</td>
                    <td>{{ $app->telefono }}</td>
                    <td>{{ $app->email }}</td>
                    <td>{{ $app->region }}</td>
                    <td>{{ $app->provincia }}</td>
                    <td>{{ $app->distrito }}</td>
                    <td>{{ $app->comentario }}</td>
                    <td>
                        @if($app->attachment)
                            <a href="{{ asset('storage/' . $app->attachment) }}" target="_blank">Ver Archivo</a>
                        @endif
                    </td>
                    <td>{{ $app->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="11" class="text-center">No hay solicitudes registradas.</td>
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
