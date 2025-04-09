@extends('layouts.admin')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row">
        <!-- Tarjeta para Promociones -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Promociones</h5>
                    <p class="card-text">Administra tus promociones: crea, edita y elimina.</p>
                    <a href="{{ route('promociones.index') }}" class="btn btn-primary">Ver Promociones</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta para Carta -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Carta</h5>
                    <p class="card-text">Gestiona los ítems de la carta de tu negocio.</p>
                    <a href="{{ url('/admin/carta') }}" class="btn btn-primary">Editar Carta</a>
                </div>
            </div>
        </div>
        <!-- Tarjeta para Locales -->
        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Locales</h5>
                    <p class="card-text">Actualiza la información de tus locales.</p>
                    <a href="{{ url('/admin/locales') }}" class="btn btn-primary">Ver Locales</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Videos</h5>
                    <p class="card-text">Actualiza la información de tus videos.</p>
                    <a href="{{ url('/admin/videos') }}" class="btn btn-primary">Ver Videos</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Sliders</h5>
                    <p class="card-text">Actualiza la información de tus Sliders.</p>
                    <a href="{{ url('/admin/sliders') }}" class="btn btn-primary">Ver Slider</a>
                </div>
            </div>
        </div>

    </div>

    <!-- Sección para estadísticas generales 
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Estadísticas Generales</h5>
                    <p class="card-text">Aquí puedes agregar gráficos y estadísticas (por ejemplo, usando Chart.js) para visualizar el rendimiento del sitio.</p>
                    
                    <canvas id="dashboardChart" width="400" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>-->
</div>
@endsection

@section('scripts')
<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('dashboardChart').getContext('2d');
    const dashboardChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Promociones', 'Carta', 'Locales'],
            datasets: [{
                label: 'Visitas (ejemplo)',
                data: [12, 19, 3], // Datos de ejemplo, cámbialos cuando tengas datos reales
                backgroundColor: [
                    'rgba(133, 186, 38, 0.7)',
                    'rgba(239, 155, 37, 0.7)',
                    'rgba(222, 39, 110, 0.7)'
                ],
                borderColor: [
                    'rgba(133, 186, 38, 1)',
                    'rgba(239, 155, 37, 1)',
                    'rgba(222, 39, 110, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection
