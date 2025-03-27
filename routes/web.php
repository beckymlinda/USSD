<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UssdCallController;



Route::post('/ussd', [UssdCallController::class, 'handleUssd']);
