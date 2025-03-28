<?php

use Illuminate\Http\Request;
use Illuminate\Foundation\Application;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Middleware\StaffMiddleware;
use App\Http\Middleware\CombineMiddleware;
use App\Http\Middleware\AdminOTPMiddleware;
use App\Http\Middleware\StaffOTPMiddleware;
use App\Http\Middleware\ForgotPasswordMiddleware;
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
            'AdminMiddle' => AdminMiddleware::class,
            'AdminOTPMiddle' => AdminOTPMiddleware::class,
            'StaffMiddle' => StaffMiddleware::class,
            'CombineMiddle' => CombineMiddleware::class,
            'ForgotPasswordMiddle' => ForgotPasswordMiddleware::class,
            'GuestMiddleware' => GuestMiddleware::class,
        ]);
        $middleware->redirectGuestsTo('/Login-Page');
        $middleware->redirectGuestsTo(fn (Request $request) => route('Login'));
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
