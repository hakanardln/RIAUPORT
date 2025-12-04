<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\Configuration\Exceptions;

return Application::configure(
    basePath: dirname(__DIR__),
)
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',   // <- BUKAN "console", tapi "commands"
        // health: '/up', // opsional
    )

    ->withMiddleware(function (Middleware $middleware) {
        // Middleware tambahan kalau mau pakai alias (opsional, nggak wajib
        // soalnya di web.php kita sudah pakai class langsung)
        $middleware->alias([
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'isSopir' => \App\Http\Middleware\IsSopir::class,
        ]);
    })

    ->withExceptions(function (Exceptions $exceptions) {
        //
    })

    ->create();
