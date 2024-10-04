<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('client.dashboard');
    })->name('dashboard');

    Route::get('/tag-audio', function () {
        return view('client.audio.index');
    })->name('tag-audio');

});
