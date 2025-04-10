<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    // Mostrar listado de videos
    public function index()
    {
        $videos = Video::all();
        return view('admin.videos.index', compact('videos'));
    }

    // Mostrar formulario para crear un nuevo video
    public function create()
    {
        return view('admin.videos.create');
    }

    // Guardar un nuevo video
    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo'         => 'nullable|string|max:255',
            'video'          => 'required|mimes:mp4,avi,mov,wmv|max:50000',
            'thumbnail'      => 'nullable|image|max:10240',
            'descripcion'    => 'nullable|string',
            'link_red_social'=> 'nullable|url', // Validación del link
        ]);

        if ($request->hasFile('video')) {
            $pathVideo = $request->file('video')->store('videos', 'public');
            $data['video'] = $pathVideo;
        }

        if ($request->hasFile('thumbnail')) {
            $pathThumb = $request->file('thumbnail')->store('videos/thumbnails', 'public');
            $data['thumbnail'] = $pathThumb;
        }

        Video::create($data);

        return redirect()->route('videos.index')->with('success', 'Video creado correctamente.');
    }

    // Mostrar un video (opcional)
    public function show($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.show', compact('video'));
    }

    // Mostrar formulario para editar un video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.videos.edit', compact('video'));
    }

    // Actualizar un video
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $data = $request->validate([
            'titulo'         => 'nullable|string|max:255',
            'video'          => 'nullable|mimes:mp4,avi,mov,wmv|max:50000',
            'thumbnail'      => 'nullable|image|max:10240',
            'descripcion'    => 'nullable|string',
            'link_red_social'=> 'nullable|url', // Nuevo campo
        ]);

        if ($request->hasFile('video')) {
            // Opcional: Eliminar el video anterior
            $pathVideo = $request->file('video')->store('videos', 'public');
            $data['video'] = $pathVideo;
        }

        if ($request->hasFile('thumbnail')) {
            // Opcional: Eliminar la miniatura anterior
            $pathThumb = $request->file('thumbnail')->store('videos/thumbnails', 'public');
            $data['thumbnail'] = $pathThumb;
        }

        $video->update($data);

        return redirect()->route('videos.index')->with('success', 'Video actualizado correctamente.');
    }

    // Eliminar un video
    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();

        return redirect()->route('videos.index')->with('success', 'Video eliminado correctamente.');
    }
}
