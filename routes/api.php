<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\ServiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/professionals', [ProfessionalController::class, 'index']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{service}/professionals', [ProfessionalController::class, 'getProfessionalsByService']);

Route::get('/appointments', [AppointmentController::class, 'index']);

Route::get("/{userId}/appointments", [AppointmentController::class, 'getAppointmentsByUser']);
Route::post('/{userId}/appointments', [AppointmentController::class, 'createAppointment']);
Route::put('/{userId}/appointments/{appointmentId}', [AppointmentController::class, 'updateAppointment']);
Route::delete('/{userId}/appointments/{appointmentId}', [AppointmentController::class, 'deleteAppointment']);
