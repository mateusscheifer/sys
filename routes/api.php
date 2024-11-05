<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/capturar-info', [\App\Http\Controllers\PageInfoController::class, 'store']);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
