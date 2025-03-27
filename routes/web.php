<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UssdCallController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/ussd', [UssdCallController::class, 'handleUssd']);
