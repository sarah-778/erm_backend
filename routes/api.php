<?php

use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\ConsultationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Consultation Submission Endpoint
Route::post('/consultations', [ConsultationController::class, 'store']);

// Public Services Endpoint for React
Route::get('/services', [ServiceController::class, 'index']);