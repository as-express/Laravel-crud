<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('product')->middleware('auth')->group(function () {
    Route::get('/list', [CarController::class,'list'])->name('list');
    Route::get('/create', [CarController::class,'insertInterface'])->name('insertInterface');
    Route::get('/update/{id}', [CarController::class,'updateInterface'])->name('updateInterface');
    Route::post('/', [CarController::class,'insert'])->name('insert');
    Route::delete('/remove/{id}', [CarController::class,'remove'])->name('remove');
});

Route::get('/login', [UserController::class, 'signinInterface'])->name('login');
Route::prefix('auth')->group(function () {
    Route::get('/signup', [UserController::class, 'signupInterface'])->name('signupInterface');
    Route::get('/signin', [UserController::class, 'signinInterface'])->name('signinInterface');
    Route::post('/signup', [UserController::class, 'signup'])->name('signup');
    Route::post('/signin', [UserController::class, 'signin'])->name('signin');
});