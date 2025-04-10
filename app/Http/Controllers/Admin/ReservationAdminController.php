<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ReservationAdminController extends Controller
{
    public function index()
    {
        $reservations = Reservation::latest()->paginate(20);
        return view('admin.reservation.index', compact('reservations'));
    }

    public function exportCsv()
    {
        $reservations = Reservation::all();

        $csv = "ID,Sede,Fecha,Hora,Personas,Tipo_Contacto,Contacto,Motivo,Mensaje,Creado\n";
        foreach ($reservations as $r) {
            $csv .= $r->id . ",";
            $csv .= '"' . $r->sede . '",';
            $csv .= $r->fecha . ",";
            $csv .= $r->hora . ",";
            $csv .= $r->numero_personas . ",";
            $csv .= $r->tipo_contacto . ",";
            $csv .= '"' . $r->contacto . '",';
            $csv .= '"' . $r->motivo . '",';
            $csv .= '"' . str_replace(["\n", "\r"], ' ', $r->mensaje) . '",';
            $csv .= $r->created_at . "\n";
        }

        $filename = "reservas_" . date('Ymd_His') . ".csv";
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
        return Response::make($csv, 200, $headers);
    }
}
