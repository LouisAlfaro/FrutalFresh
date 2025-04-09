<?php

// app/Http/Controllers/LandingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;
use App\Models\Carta;
use App\Models\Local;
use App\Models\Video;
use App\Models\Slider;

class LandingController extends Controller
{
    public function index()
    {
        // Puedes personalizar qué datos mostrar en la página principal.
        $promociones = Promocion::latest()->take(3)->get();
        $carta = Carta::all();
        $locales = Local::all();
        $sliders = Slider::orderBy('orden')->get();
        $videos = \App\Models\Video::latest()->get();

        return view('landing.index', compact('promociones', 'carta', 'locales', 'videos','sliders'));
    }

    public function promociones()
    {
        $promociones = Promocion::latest()->get();
        return view('landing.promociones', compact('promociones'));
    }

    public function carta()
{
    $cartaItems = Carta::with('local')->get();
    // Agrupamos por el nombre del local; si no hay local, usamos "Sin Local"
    $carta = $cartaItems->groupBy(function($item) {
        return $item->local ? $item->local->nombre : 'Sin Local';
    });
    return view('landing.carta', compact('carta'));
}


    public function locales()
    {
        $locales = Local::all();
        return view('landing.locales', compact('locales'));
    }
}
