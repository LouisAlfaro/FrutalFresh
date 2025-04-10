<?php

namespace App\Http\Controllers;

use App\Models\WorkBenefit;
use App\Models\WorkApplication;
use Illuminate\Http\Request;

class WorkOpportunityController extends Controller
{
    public function index()
    {
        // Obtener todos los beneficios ordenados (puedes usar 'order' para ordenarlos)
        $benefits = WorkBenefit::orderBy('order')->get();
        return view('landing.trabaja', compact('benefits'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'       => 'required|string|max:255',
            'especialidad' => 'required|string|max:255',
            'telefono'     => 'nullable|string|max:255',
            'email'        => 'nullable|email|max:255',
            'region'       => 'nullable|string|max:255',
            'experiencia'  => 'nullable|string',
            'comentario'   => 'nullable|string',
            'attachment'   => 'nullable|file|max:20480', // Hasta 20MB
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('workapplications', 'public');
            $data['attachment'] = $path;
        }

        WorkApplication::create($data);

        return redirect()->route('workopportunity.index')
                         ->with('success', 'Tu solicitud ha sido enviada. ¡Gracias!');
    }
}
