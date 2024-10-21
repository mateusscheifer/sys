<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing_page');
});

<<<<<<< HEAD
Route::get('/streamAudio',[\App\Http\Controllers\AudioPlayerController::class, 'stream'])->name('streamAudio');
=======


Route::get('/teste', function () {
//    $a = new \App\Http\Services\VoiceCreateAiService();
//    dd($a->generateAudio());
});
>>>>>>> master



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', [\App\Http\Controllers\Client\DashboardController::class, 'index'])->name('dashboard');

<<<<<<< HEAD
    Route::get('/tag-audio', [\App\Http\Controllers\Client\TagsController::class, 'audio'])->name('tag-audio');
    Route::get('/tag-audio/{id}', [\App\Http\Controllers\Client\TagsController::class, 'audioEdit'])->name('tag-audio-edit');
=======

    Route::get('/api', [\App\Http\Controllers\Client\ApiController::class, 'index'])->name('api');
    Route::get('/docs', [\App\Http\Controllers\Client\DocsController::class, 'index'])->name('docs');
    Route::get('/ajuda', [\App\Http\Controllers\Client\AjudaController::class, 'index'])->name('ajuda');

    Route::get('/tag-audio', [\App\Http\Controllers\Client\TagsController::class, 'audio'])->name('tag-audio');
>>>>>>> master


});
