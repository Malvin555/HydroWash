<?php

use App\Http\Middleware\ActivityLog;
use App\Http\Middleware\EnsureIsUser;
use App\Http\Middleware\EnsureIsAdmin;
use Illuminate\Foundation\Application;
use App\Http\Middleware\VerifyApiToken;
use App\Http\Middleware\AllowGuestAccess;
use App\Http\Middleware\AutoLoginFromCookie;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'ensure.is.admin' => EnsureIsAdmin::class,
            'ensure.is.user' => EnsureIsUser::class,
            'allow.guest' => AllowGuestAccess::class,
            'auto.login.from.cookie' => AutoLoginFromCookie::class,
        ]);

        $middleware->api(append: [
            'throttle:60,1',
            VerifyApiToken::class,
            ActivityLog::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
