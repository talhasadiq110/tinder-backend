<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Test route
Route::get('/api/test', function () {
    return response()->json([
        'message' => 'API is working!', 
        'status' => 'success',
        'timestamp' => now()
    ]);
});

// Tinder App Routes
Route::get('/api/recommendations', function () {
    return response()->json([
        'message' => 'Get recommendations - TODO',
        'data' => []
    ]);
});

Route::post('/api/like/{id}', function ($id) {
    return response()->json([
        'message' => 'Like person ' . $id . ' - TODO',
        'success' => true
    ]);
});

Route::post('/api/dislike/{id}', function ($id) {
    return response()->json([
        'message' => 'Dislike person ' . $id . ' - TODO', 
        'success' => true
    ]);
});

Route::get('/api/liked', function () {
    return response()->json([
        'message' => 'Get liked people - TODO',
        'data' => []
    ]);
});