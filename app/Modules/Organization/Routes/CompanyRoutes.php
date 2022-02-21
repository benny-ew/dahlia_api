<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Modules\Organization\Controllers\CompanyController as Controller;

Route::get('company/options', Controller::class.'@getSelectOptions');
Route::post('company/saveImage', Controller::class.'@saveImage')->middleware('auth:api');

Route::prefix('companies')->middleware('auth:api')->group(function () {
    Route::get('', Controller::class . '@index');
    Route::get('/{id}', Controller::class . '@show');
    Route::delete('/{id}', Controller::class . '@delete');
    Route::post('', Controller::class . '@create');
    Route::patch('/{id}', Controller::class . '@update');
    
});