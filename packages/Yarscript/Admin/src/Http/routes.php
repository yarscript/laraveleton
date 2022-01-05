<?php

use Illuminate\Support\Facades\Route;

use Yarscript\Admin\Http\Controllers\{
    DashboardController,
    Auth\SessionController as AdminSessionController,
};
use Yarscript\Admin\Http\Middleware\Bouncer as BouncerMiddleware;


Route::middleware(['web'])->group(function () {
    Route::get('/login', [AdminSessionController::class, 'create'])->defaults('request_config', [
        'view' => 'admin::users.sessions.create',
    ])->name('session.create');

    Route::post('/login', [AdminSessionController::class, 'store'])->defaults('request_config', [
        'redirect' => 'admin.dashboard.index',
    ])->name('session.store');

    Route::get('/logout', [AdminSessionController::class, 'destroy'])->defaults('request_config', [
        'redirect' => 'admin.session.create',
    ])->name('session.destroy');

    Route::middleware([BouncerMiddleware::class])->group(function () {
        /**
         * Dashboard routes
         */
        Route::get('/', fn() => redirect()->route('admin.dashboard.index'))
             ->name('index');

        Route::get('/dashboard', [DashboardController::class, 'index'])->defaults('request_config', [
            'view' => 'admin::dashboard.index',
        ])->name('dashboard.index');

    });
});


