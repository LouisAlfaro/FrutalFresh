<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkBenefit;
use Illuminate\Http\Request;

class WorkBenefitController extends Controller
{
    /**
     * Muestra la lista de beneficios
     * GET /admin/workbenefits
     */
    public function index()
    {
        // Obtener todos los beneficios ordenados por la columna 'order'
        $benefits = WorkBenefit::orderBy('order', 'asc')->get();
        return view('admin.workbenefits.index', compact('benefits'));
    }

    /**
     * Muestra el formulario para crear un nuevo beneficio
     * GET /admin/workbenefits/create
     */
    public function create()
    {
        return view('admin.workbenefits.create');
    }

    /**
     * Almacena un nuevo beneficio en la base de datos
     * POST /admin/workbenefits
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:10240', // máx 10MB
            'order'       => 'nullable|integer',
        ]);

        // Si se sube una imagen, guardarla
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('workbenefits', 'public');
            $data['image'] = $path;
        }

        WorkBenefit::create($data);
        return redirect()->route('work-benefits.index')
                         ->with('success', 'Beneficio creado correctamente.');
    }

    /**
     * Muestra un beneficio específico
     * GET /admin/workbenefits/{workbenefit}
     * (Generalmente opcional en un panel)
     */
    public function show($id)
    {
        $benefit = WorkBenefit::findOrFail($id);
        return view('admin.workbenefits.show', compact('benefit'));
    }

    /**
     * Muestra el formulario para editar un beneficio
     * GET /admin/workbenefits/{workbenefit}/edit
     */
    public function edit($id)
    {
        $benefit = WorkBenefit::findOrFail($id);
        return view('admin.workbenefits.edit', compact('benefit'));
    }

    /**
     * Actualiza un beneficio
     * PUT /admin/workbenefits/{workbenefit}
     */
    public function update(Request $request, $id)
    {
        $benefit = WorkBenefit::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'image'       => 'nullable|image|max:10240', // máx 10MB
            'order'       => 'nullable|integer',
        ]);

        // Si se sube una nueva imagen
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('workbenefits', 'public');
            $data['image'] = $path;
        }

        $benefit->update($data);
        return redirect()->route('work-benefits.index')
                         ->with('success', 'Beneficio actualizado correctamente.');
    }

    /**
     * Elimina un beneficio
     * DELETE /admin/workbenefits/{workbenefit}
     */
    public function destroy($id)
    {
        $benefit = WorkBenefit::findOrFail($id);
        $benefit->delete();
        return redirect()->route('work-benefits.index')
                         ->with('success', 'Beneficio eliminado correctamente.');
    }
}
