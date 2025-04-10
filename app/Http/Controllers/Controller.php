<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\SocialLink; // Importa el modelo

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $socialLinks = SocialLink::find(1) ?? (object)[
            'facebook' => '',
            'instagram' => '',
            'tiktok' => '',
            'x' => '',
            'linkedin' => '',
        ];

        view()->share('socialLinks', $socialLinks);
    }
}
