<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BusinessOpportunityApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BusinessOpportunityApplicationAdminController extends Controller
{
    public function index()
    {
        $applications = BusinessOpportunityApplication::latest()->paginate(20);
        return view('admin.business_opportunity_applications.index', compact('applications'));
    }

    public function exportCsv()
    {
        $applications = BusinessOpportunityApplication::all();
        
        $csv = "ID,Empresa,Rubro,Teléfono,Email,Región,Provincia,Distrito,Comentario,Adjunto,Creado\n";
        foreach ($applications as $app) {
            $csv .= $app->id . ",";
            $csv .= '"' . $app->empresa . '",';
            $csv .= '"' . $app->rubro . '",';
            $csv .= '"' . $app->telefono . '",';
            $csv .= '"' . $app->email . '",';
            $csv .= '"' . $app->region . '",';
            $csv .= '"' . $app->provincia . '",';
            $csv .= '"' . $app->distrito . '",';
            $comentario = str_replace(["\r", "\n"], ' ', $app->comentario);
            $csv .= '"' . $comentario . '",';
            $csv .= '"' . $app->attachment . '",';
            $csv .= $app->created_at->format('d/m/Y H:i') . "\n";
        }
        
        $filename = "oportunidades_" . date('Ymd_His') . ".csv";
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];
        
        return Response::make($csv, 200, $headers);
    }
}
