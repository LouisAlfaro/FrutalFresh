<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visita;
use Jenssegers\Agent\Agent; // Instala este paquete para detectar dispositivos

class RegistroVisita
{
    public function handle(Request $request, Closure $next)
{
    // Para pruebas, registra todas las visitas:
    $agent = new \Jenssegers\Agent\Agent();
    $agent->setUserAgent($request->header('User-Agent'));

    \App\Models\Visita::create([
        'ip'         => $request->ip(),
        'user_agent' => $request->header('User-Agent'),
        'device'     => $agent->isMobile() ? 'Móvil' : ($agent->isTablet() ? 'Tablet' : 'Escritorio'),
        'browser'    => $agent->browser(),
    ]);

    return $next($request);
}

}
