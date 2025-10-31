<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// API Routes using Controller
Route::get('/api/test', [PersonController::class, 'test']);
Route::get('/api/recommendations', [PersonController::class, 'recommendations']);
Route::get('/api/like/{id}', [PersonController::class, 'like']); // Changed to GET
Route::get('/api/dislike/{id}', [PersonController::class, 'dislike']); // Changed to GET
Route::get('/api/liked', [PersonController::class, 'liked']);
Route::get('/api/debug/swipes', [PersonController::class, 'debugSwipes']);