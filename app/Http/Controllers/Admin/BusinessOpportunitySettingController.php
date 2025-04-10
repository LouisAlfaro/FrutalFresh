<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessOpportunitySetting;
use Illuminate\Http\Request;

class BusinessOpportunitySettingController extends Controller
{
    public function edit()
    {
        // Asumimos un registro único. Si no existe, lo creamos.
        $setting = BusinessOpportunitySetting::find(1);
        if (!$setting) {
            $setting = BusinessOpportunitySetting::create([
                'image' => null,
                'title' => 'Oportunidad Comercial',
            ]);
        }
        return view('admin.business_opportunity_setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = BusinessOpportunitySetting::findOrFail(1);

        $data = $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|max:10240', // máx 10MB
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('business_opportunity', 'public');
            $data['image'] = $path;
        }

        $setting->update($data);

        return redirect()->route('businessopportunitysetting.edit')
                         ->with('success', 'Configuración actualizada correctamente.');
    }
}
