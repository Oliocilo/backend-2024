<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route untuk menampilkan semua pasien
Route::get('/patients', [PatientController::class, 'index']);

// Route untuk menampilkan data pasien berdasarkan ID
Route::get('/patients/{id}', [PatientController::class, 'show']);

// Route untuk menambahkan pasien baru
Route::post('/patients', [PatientController::class, 'store']);

// Route untuk memperbarui data pasien berdasarkan ID
Route::put('/patients/{id}', [PatientController::class, 'update']);

// Route untuk menghapus data pasien berdasarkan ID
Route::delete('/patients/{id}', [PatientController::class, 'destroy']);

Route::post('/login', [PatientController::class, 'login'])->name('login');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route yang dilindungi dengan middleware autentikasi (opsional)
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/patients', [PatientController::class, 'store']);
    Route::put('/patients/{id}', [PatientController::class, 'update']);
    Route::delete('/patients/{id}', [PatientController::class, 'destroy']);
});