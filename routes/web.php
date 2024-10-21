<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});



Route::get('/teste', function () {
//    $a = new \App\Http\Services\VoiceCreateAiService();
//    dd($a->generateAudio());
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');


    Route::get('/api', [\App\Http\Controllers\Client\ApiController::class, 'index'])->name('api');
    Route::get('/docs', [\App\Http\Controllers\Client\DocsController::class, 'index'])->name('docs');
    Route::get('/ajuda', [\App\Http\Controllers\Client\AjudaController::class, 'index'])->name('ajuda');

    Route::get('/tag-audio', [\App\Http\Controllers\Client\TagsController::class, 'audio'])->name('tag-audio');


});
