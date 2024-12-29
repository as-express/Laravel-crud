<?php

use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('product')->group(function () {
    Route::get('/', [CarController::class,'list'])->name('list');
    Route::get('/create', [CarController::class,'insertInterface'])->name('insertInterface');
    Route::get('/update/{id}', [CarController::class,'updateInterface'])->name('updateInterface');

    Route::post('/', [CarController::class,'insert'])->name('insert');
    Route::delete('/remove/{id}', [CarController::class,'remove'])->name('remove');
});