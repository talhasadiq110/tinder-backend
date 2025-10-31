<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Add this test API route
Route::get('/api/test', function () {
    return response()->json([
        'message' => 'API is working!', 
        'status' => 'success',
        'timestamp' => now()
    ]);
});