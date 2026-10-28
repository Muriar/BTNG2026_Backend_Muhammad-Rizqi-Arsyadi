<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MobilController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('mobil', MobilController::class);
Route::get('/mobil', [MobilController::class, 'index'])->name('mobil.index');
Route::post('/mobil', [MobilController::class, 'store'])->name('mobil.store');
Route::get('/mobil/{id}', [MobilController::class, 'show'])->name('mobil.show');
Route::put('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.update');
Route::patch('/mobil/{id}', [MobilController::class, 'update'])->name('mobil.patch');
Route::delete('/mobil/{id}', [MobilController::class, 'destroy'])->name('mobil.destroy');
