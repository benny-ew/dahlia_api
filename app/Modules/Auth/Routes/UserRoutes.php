<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Modules\Auth\Controllers\UserController as Controller;

Route::prefix('users')->middleware('auth:api')->group(function () {
    Route::get('', Controller::class . '@index');
    Route::get('/{id}', Controller::class . '@show');
    Route::delete('/{id}', Controller::class . '@delete');
    Route::post('', Controller::class . '@create');
    Route::patch('/{id}', Controller::class . '@update');

    Route::patch('/{id}/role/{operation}/{role}', Controller::class . '@changeRole');
    Route::patch('/{id}/activation/{operation}', Controller::class . '@changeActiveStatus');
    Route::patch('/{id}/verification/{operation}', Controller::class . '@changeVerificationStatus');
    
});