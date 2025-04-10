<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialLink;
use Illuminate\Http\Request;

class SocialLinkController extends Controller
{
    public function edit()
    {
        // Asumimos que existe un registro único con ID=1. Si no existe, se crea.
        $social = SocialLink::find(1);
        if (!$social) {
            $social = SocialLink::create([
                'facebook' => '',
                'instagram' => '',
                'tiktok' => '',
                'x' => '',
                'linkedin' => '',
            ]);
        }
        return view('admin.social_links.edit', compact('social'));
    }

    public function update(Request $request)
{
    $social = SocialLink::findOrFail(1);

    $data = $request->validate([
        'facebook'  => 'nullable|string|max:255',
        'instagram' => 'nullable|string|max:255',
        'tiktok'    => 'nullable|string|max:255',
        'x'         => 'nullable|string|max:255',
        'linkedin'  => 'nullable|string|max:255',
    ]);

    // Recorremos y agregamos https:// si falta
    foreach ($data as $key => $url) {
        if ($url && !preg_match('/^https?:\/\//i', $url)) {
            $data[$key] = 'https://' . ltrim($url, '/');
        }
    }

    $social->update($data);

    return redirect()->route('sociallinks.edit')
                     ->with('success', 'Enlaces actualizados correctamente.');
}

}
