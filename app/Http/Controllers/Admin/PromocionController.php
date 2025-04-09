<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Promocion;

class PromocionController extends Controller
{
    // Mostrar la lista de promociones
    public function index()
    {
        $promociones = Promocion::all();
        return view('admin.promociones.index', compact('promociones'));
    }

    // Mostrar formulario para crear nueva promoción
    public function create()
{
    return view('admin.promociones.create');
}

    // Guardar nueva promoción
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'imagen'       => 'nullable|image',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin'    => 'nullable|date',
        ]);

        // Si se sube una imagen, se guarda en 'public/promociones'
        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('promociones', 'public');
            $data['imagen'] = $path;
        }

        Promocion::create($data);

        return redirect()->route('promociones.index')->with('success', 'Promoción creada correctamente.');
    }

    // Mostrar una promoción (opcional)
    public function show($id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('admin.promociones.show', compact('promocion'));
    }

    // Mostrar formulario para editar una promoción
    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        return view('admin.promociones.edit', compact('promocion'));
    }

    // Actualizar promoción
    public function update(Request $request, $id)
    {
        $promocion = Promocion::findOrFail($id);

        $data = $request->validate([
            'titulo'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'imagen'       => 'nullable|image',
            'fecha_inicio' => 'nullable|date',
            'fecha_fin'    => 'nullable|date',
        ]);

        if ($request->hasFile('imagen')) {
            // Puedes agregar lógica para borrar la imagen antigua
            $path = $request->file('imagen')->store('promociones', 'public');
            $data['imagen'] = $path;
        }

        $promocion->update($data);

        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada correctamente.');
    }

    // Eliminar promoción
    public function destroy($id)
    {
        $promocion = Promocion::findOrFail($id);
        $promocion->delete();

        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada correctamente.');
    }
}
