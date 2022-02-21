<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Modules\Organization\Controllers\DashboardController as Controller;

Route::get('dashboard', Controller::class.'@view');