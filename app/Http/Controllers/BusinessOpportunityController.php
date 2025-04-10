<?php

namespace App\Http\Controllers;

use App\Models\BusinessOpportunitySetting;
use App\Models\BusinessOpportunityApplication;
use Illuminate\Http\Request;

class BusinessOpportunityController extends Controller
{
    public function index()
    {
        // Obtén la configuración (imagen y título)
        $setting = BusinessOpportunitySetting::find(1);
        return view('landing.hagamos-negocios', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'empresa'    => 'required|string|max:255',
            'rubro'      => 'nullable|string|max:255',
            'telefono'   => 'nullable|string|max:255',
            'email'      => 'nullable|email|max:255',
            'region'     => 'nullable|string|max:255',
            'provincia'  => 'nullable|string|max:255',
            'distrito'   => 'nullable|string|max:255',
            'comentario' => 'nullable|string',
            'attachment' => 'nullable|file|max:20480', // Hasta 20MB
        ]);

        if ($request->hasFile('attachment')) {
            $path = $request->file('attachment')->store('business_opportunity_apps', 'public');
            $data['attachment'] = $path;
        }

        BusinessOpportunityApplication::create($data);

        return redirect()->route('businessopportunity.index')
                         ->with('success', 'Tu solicitud ha sido enviada. ¡Gracias!');
    }
}
