<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    // Mostrar listado de locales
    public function index()
    {
        $locales = Local::all();
        return view('admin.locales.index', compact('locales'));
    }

    // Mostrar formulario para crear un nuevo local
    public function create()
    {
        return view('admin.locales.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'direccion'   => 'required|string|max:255',
            'telefono'    => 'nullable|string|max:50',
            'horario'     => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|image|max:10240',
            'googlemaps'  => 'nullable|url',
            'whatsapp'    => 'nullable|string|max:50',
            'pdf_carta'   => 'nullable|file|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('locales', 'public');
        }
        if ($request->hasFile('pdf_carta')) {
            $data['pdf_carta'] = $request->file('pdf_carta')->store('locales/pdf', 'public');
        }

        \App\Models\Local::create($data);

        return redirect()->route('locales.index')->with('success', 'Local creado correctamente.');
    }


    


    // Mostrar un local (opcional)
    public function show($id)
    {
        $local = Local::findOrFail($id);
        return view('admin.locales.show', compact('local'));
    }

    // Mostrar formulario para editar un local
    public function edit($id)
    {
        $local = Local::findOrFail($id);
        return view('admin.locales.edit', compact('local'));
    }

    // Actualizar un local
    public function update(Request $request, $id)
    {
        $local = \App\Models\Local::findOrFail($id);

        $data = $request->validate([
            'nombre'      => 'required|string|max:255',
            'direccion'   => 'required|string|max:255',
            'telefono'    => 'nullable|string|max:50',
            'horario'     => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|image|max:10240',
            'googlemaps'  => 'nullable|url',
            'whatsapp'    => 'nullable|string|max:50',
            'pdf_carta'   => 'nullable|file|mimes:pdf|max:20480',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('locales', 'public');
        }
        if ($request->hasFile('pdf_carta')) {
            $data['pdf_carta'] = $request->file('pdf_carta')->store('locales/pdf', 'public');
        }

        $local->update($data);

        return redirect()->route('locales.index')->with('success', 'Local actualizado correctamente.');
    }



    // Eliminar un local
    public function destroy($id)
    {
        $local = Local::findOrFail($id);
        $local->delete();

        return redirect()->route('locales.index')->with('success', 'Local eliminado correctamente.');
    }
}
