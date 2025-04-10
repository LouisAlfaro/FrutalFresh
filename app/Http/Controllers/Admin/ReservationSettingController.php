<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReservationSetting;
use Illuminate\Http\Request;

class ReservationSettingController extends Controller
{
    public function edit()
    {
        // Se asume que el registro es único, ID = 1.
        $setting = ReservationSetting::find(1);
        if (!$setting) {
            $setting = ReservationSetting::create([
                'banner_10_20' => '10 a 20 personas: Cotizar Restaurante y Beneficios',
                'banner_20_30' => '20 a 30 personas: Cotizar Restaurante y Beneficios',
                'banner_30_plus' => '30 a más personas: Cotizar Restaurante y Beneficios',
                'title_form' => 'Elige cuando realizar tu reserva',
            ]);
        }
        return view('admin.reservationsetting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = ReservationSetting::findOrFail(1);

        $data = $request->validate([
            'banner_10_20' => 'nullable|string|max:255',
            'banner_20_30' => 'nullable|string|max:255',
            'banner_30_plus' => 'nullable|string|max:255',
            'title_form' => 'nullable|string|max:255',
        ]);

        $setting->update($data);
        return redirect()->route('reservationsetting.edit')
                         ->with('success', 'Configuración de reservas actualizada correctamente.');
    }
}
