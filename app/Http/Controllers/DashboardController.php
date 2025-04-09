<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Aquí podrías consultar datos para estadísticas.
        // Por ahora, solo retornamos la vista del dashboard.
        return view('admin.dashboard');
    }
}
