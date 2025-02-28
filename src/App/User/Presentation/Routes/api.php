<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Src\App\User\Presentation\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/login2', [UserController::class, 'login2']);

Route::get('/login2', function (Request $request) {
    dd('entro');
});
