<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Local;

class CartaController extends Controller
{
    // Mostrar lista de ítems de la carta (Backoffice)
    public function index()
    {
        // Cargamos todos los ítems con su local (eager loading)
        $items = Carta::with('local')->get();
        return view('admin.carta.index', compact('items'));
    }

    // Mostrar formulario para crear un nuevo ítem
    public function create()
    {
        $locals = Local::all();
        return view('admin.carta.create', compact('locals'));
    }

    // Guardar un nuevo ítem en la carta
    public function store(Request $request)
    {
        $data = $request->validate([
            'local_id'    => 'required|exists:locals,id',
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio'      => 'nullable|numeric',
            'imagen'      => 'nullable|image',
        ]);

        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('cartas', 'public');
        }

        Carta::create($data);

        return redirect()->route('carta.index')->with('success', 'Ítem de la carta creado correctamente.');
    }

    // Mostrar un ítem (opcional)
    public function show($id)
    {
        $item = Carta::findOrFail($id);
        return view('admin.carta.show', compact('item'));
    }

    // Mostrar formulario para editar un ítem
    public function edit($id)
    {
        $item = Carta::findOrFail($id);
        $locals = Local::all();
        return view('admin.carta.edit', compact('item', 'locals'));
    }

    // Actualizar un ítem
    public function update(Request $request, $id)
    {
        $item = Carta::findOrFail($id);

        $data = $request->validate([
            'local_id'    => 'required|exists:locals,id',
            'nombre'      => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio'      => 'nullable|numeric',
            'imagen'      => 'nullable|image',
        ]);

        if ($request->hasFile('imagen')) {
            // Opcional: eliminar la imagen anterior si es necesario
            $data['imagen'] = $request->file('imagen')->store('cartas', 'public');
        }

        $item->update($data);

        return redirect()->route('carta.index')->with('success', 'Ítem actualizado correctamente.');
    }

    // Eliminar un ítem de la carta
    public function destroy($id)
    {
        $item = Carta::findOrFail($id);
        $item->delete();

        return redirect()->route('carta.index')->with('success', 'Ítem eliminado correctamente.');
    }
}
