<?php

use App\Http\Controllers\ApiRequestController;
use App\Http\Controllers\HospitalRequestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::Resource('/request',HospitalRequestController::class);
