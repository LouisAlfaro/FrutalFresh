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

<div class="row">
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Beneficios - Trabaja con nosotros</h5>
                <p class="card-text">Gestiona los beneficios mostrados en la sección.</p>
                <a href="{{ route('work-benefits.index') }}" class="btn btn-primary">Editar Beneficios</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Postulaciones</h5>
                <p class="card-text">Ver y exportar las postulaciones recibidas.</p>
                <a href="{{ route('workapplications.index') }}" class="btn btn-primary">Ver Postulaciones</a>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <!-- Tarjeta para Configurar "Hagamos Negocios" -->
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Configurar “Hagamos Negocios”</h5>
                <p class="card-text">Editar la imagen y el título que se muestran en la sección.</p>
                <a href="{{ route('businessopportunitysetting.edit') }}" class="btn btn-primary">Editar Configuración</a>
            </div>
        </div>
    </div>
    <!-- Tarjeta para Ver Postulaciones -->
    <div class="col-md-6">
        <div class="card text-center mb-4">
            <div class="card-body">
                <h5 class="card-title">Postulaciones Comerciales</h5>
                <p class="card-text">Ver y exportar las solicitudes recibidas.</p>
                <a href="{{ route('businessopportunityapplications.index') }}" class="btn btn-primary">Ver Postulaciones</a>
            </div>
        </div>
    </div>
</div>

<div class="card text-center">
    <div class="card-body">
        <h5 class="card-title">Contacto</h5>
        <p class="card-text">Modifica la información de contacto (horario, teléfono, correo).</p>
        <a href="{{ route('contacts.edit') }}" class="btn btn-primary">Editar Contacto</a>
    </div>
</div>  

<div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Nuestra Empresa</h5>
                <p class="card-text">Editar información de Nuestra Empresa.</p>
                <a href="{{ route('empresa.edit') }}" class="btn btn-primary">Editar</a>
            </div>
</div>

<div class="card text-center mb-4">
    <div class="card-body">
        <h5 class="card-title">Redes Sociales</h5>
        <p class="card-text">Editar enlaces de tus redes sociales oficiales.</p>
        <a href="{{ route('sociallinks.edit') }}" class="btn btn-primary">Editar Redes Sociales</a>
    </div>
</div>


<div class="card text-center mb-4" style="border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    <div class="card-body">
        <h5 class="card-title">Reservas</h5>
        <p class="card-text">Ver y gestionar las reservas recibidas.</p>
        <a href="{{ route('reservations.admin.index') }}" class="btn btn-primary">Ver Reservas</a>
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
