<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // --- TAMBAHKAN KODE DI BAWAH INI ---
        $middleware->redirectTo(
            guests: '/login',             // Tujuan jika user BELUM login tapi akses halaman terproteksi
            users: '/admin/dashboard'     // Tujuan jika user SUDAH login tapi akses halaman 'guest' (login)
        );
        // ----------------------------------
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();