<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Route::middleware('auth')->get('/api/user', function () {
//     return Auth::user();
// });

// Route::get('/login', [AuthController::class, 'redirectToGoogle'])->name('login');

// Route::get('/auth/google', [AuthController::class, 'redirectToGoogle'])->name('google.login');
// Route::get('/auth/google/callback', [AuthController::class, 'handleGoogleCallback']);



Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Top
Route::get('/todo', [TopController::class, 'init'])->name('top.init');
