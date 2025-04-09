<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('orden')->get();
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'      => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'required|image|max:10240', // máximo 10MB, ajustar según necesidad
            'orden'       => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            $path = $request->file('imagen')->store('sliders', 'public');
            $data['imagen'] = $path;
        }

        Slider::create($data);

        return redirect()->route('sliders.index')->with('success', 'Slider creado correctamente.');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $data = $request->validate([
            'titulo'      => 'nullable|string|max:255',
            'descripcion' => 'nullable|string',
            'imagen'      => 'nullable|image|max:10240',
            'orden'       => 'nullable|integer',
        ]);

        if ($request->hasFile('imagen')) {
            // Puedes borrar la imagen anterior si lo deseas
            $path = $request->file('imagen')->store('sliders', 'public');
            $data['imagen'] = $path;
        }

        $slider->update($data);

        return redirect()->route('sliders.index')->with('success', 'Slider actualizado correctamente.');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('sliders.index')->with('success', 'Slider eliminado correctamente.');
    }
}
