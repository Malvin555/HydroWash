<?php

use App\Http\Middleware\AllowGuestAccess;
use App\Http\Middleware\EnsureIsAdmin;
use App\Http\Middleware\EnsureIsUser;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'ensure.is.admin' => EnsureIsAdmin::class,
            'ensure.is.user' => EnsureIsUser::class,
            'allow.guest' => AllowGuestAccess::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
