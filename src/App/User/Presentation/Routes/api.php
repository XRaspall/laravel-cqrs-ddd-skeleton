<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Src\App\User\Presentation\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'destroy'])->middleware('auth:sanctum');;
