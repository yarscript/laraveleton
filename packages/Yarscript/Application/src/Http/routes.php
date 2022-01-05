<?php

use Yarscript\Application\Http\Controllers\{IndexController};

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [IndexController::class, 'index'])->defaults('request_config', [
        'view' => 'application::home',
    ])->name('home');

});
