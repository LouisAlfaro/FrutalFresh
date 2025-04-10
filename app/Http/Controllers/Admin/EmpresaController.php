<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function edit()
    {
        // Buscamos el registro único, asumiendo que el ID es 1
        $empresa = Empresa::find(1);
        if (!$empresa) {
            // Creamos un registro con valores por defecto si no existe
            $empresa = Empresa::create([
                'title'   => 'Nuestra Empresa',
                'content' => 'Aquí va la información sobre nuestra empresa...',
                'mission' => 'Nuestra misión...',
                'vision'  => 'Nuestra visión...',
            ]);
        }
        return view('admin.empresa.edit', compact('empresa'));
    }

    public function update(Request $request)
    {
        $empresa = Empresa::findOrFail(1);

        // Validamos los datos. Si se sube una imagen, se valida como archivo de imagen.
        $data = $request->validate([
            'title'   => 'nullable|string|max:255',
            'content' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision'  => 'nullable|string',
            'image'   => 'nullable|image|max:10240', // Máximo 10MB, ajusta según tus necesidades
        ]);

        // Si se sube imagen, la almacenamos en la carpeta 'empresas' dentro de 'storage/app/public'
        if ($request->hasFile('image')) {
            // Opcional: Si deseas eliminar la imagen antigua, podrías hacerlo aquí.
            $path = $request->file('image')->store('empresas', 'public');
            $data['image'] = $path;
        }

        $empresa->update($data);

        return redirect()->route('empresa.edit')
                         ->with('success', 'Información de "Nuestra Empresa" actualizada correctamente.');
    }
}
