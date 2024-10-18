<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});

Route::get('/streamAudio',[\App\Http\Controllers\AudioPlayerController::class, 'stream'])->name('streamAudio');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tag-audio', [\App\Http\Controllers\Client\TagsController::class, 'audio'])->name('tag-audio');


});
