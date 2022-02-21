<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Modules\Data\Controllers\EntityController as Controller;


Route::prefix('entities')->middleware('auth:api')->group(function () {
    Route::get('', Controller::class . '@index');
    Route::get('/{id}', Controller::class . '@show');
    Route::delete('/{id}', Controller::class . '@delete');
    Route::post('', Controller::class . '@create');
    Route::patch('/{id}', Controller::class . '@update');
    
});