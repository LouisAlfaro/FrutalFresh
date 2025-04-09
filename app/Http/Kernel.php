protected $middlewareGroups = [
    'web' => [
        // Estos vienen por defecto en Laravel:
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        // \Illuminate\Session\Middleware\AuthenticateSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
        \Illuminate\Routing\Middleware\SubstituteBindings::class,

        // Agrega tu middleware aquí
        \App\Http\Middleware\RegistroVisita::class,
    ],

    'api' => [
        // ...
    ],
];
