<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Modules\Auth\Controllers\AuthController as Controller;

Route::prefix('auth')->group(function () {
    Route::post('register', [Controller::class, 'register']);
    Route::post('login', [Controller::class, 'login']);
    Route::get('logout', [Controller::class, 'logout'])->middleware('auth:api');
    Route::get('validate', [Controller::class, 'isValidLogin'])->middleware('auth:api');
});

