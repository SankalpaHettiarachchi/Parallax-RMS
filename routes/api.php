<?php

use App\Http\Controllers\HospitalRequestController;
use Illuminate\Support\Facades\Route;

Route::apiResource('/request',HospitalRequestController::class);
