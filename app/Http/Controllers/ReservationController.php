<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\ReservationSetting;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create()
    {
        // Obtiene la configuración para mostrar en el formulario
        $setting = ReservationSetting::find(1);
        return view('landing.reservar', compact('setting'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'sede'            => 'required|string|max:255',
            'fecha'           => 'required|date',
            'hora'            => 'required',
            'numero_personas' => 'required|integer',
            'tipo_contacto'   => 'required|string|max:50',
            'contacto'        => 'required|string|max:255',
            'motivo'          => 'nullable|string|max:255',
            'mensaje'         => 'nullable|string',
        ]);

        Reservation::create($data);
        return redirect()->route('reservation.create')
                         ->with('success', 'Reserva enviada correctamente. ¡Gracias!');
    }
}
