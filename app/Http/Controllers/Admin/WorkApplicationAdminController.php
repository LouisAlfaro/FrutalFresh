<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WorkApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class WorkApplicationAdminController extends Controller
{
    public function index()
    {
        $applications = WorkApplication::latest()->paginate(20);
        return view('admin.workapplications.index', compact('applications'));
    }

    public function exportCsv()
    {
        $applications = WorkApplication::all();

        $csv = "ID,Nombre,Especialidad,Teléfono,Email,Región,Experiencia,Comentario,Archivo,Fecha\n";
        foreach ($applications as $a) {
            $csv .= $a->id . ",";
            $csv .= '"' . $a->nombre . '",';
            $csv .= '"' . $a->especialidad . '",';
            $csv .= '"' . $a->telefono . '",';
            $csv .= '"' . $a->email . '",';
            $csv .= '"' . $a->region . '",';
            $csv .= '"' . str_replace(["\n", "\r"], ' ', $a->experiencia) . '",';
            $csv .= '"' . str_replace(["\n", "\r"], ' ', $a->comentario) . '",';
            $csv .= '"' . $a->attachment . '",';
            $csv .= $a->created_at . "\n";
        }

        $filename = "aplicaciones_" . date('Ymd_His') . ".csv";
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        return Response::make($csv, 200, $headers);
    }
}
