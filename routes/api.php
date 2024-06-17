<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/api/produtos', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
