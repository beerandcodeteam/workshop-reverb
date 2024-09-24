<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ChatController::class, 'openroom'])
    ->middleware(['auth'])
    ->name('chat');

Route::get('/user/{user}', [\App\Http\Controllers\ChatController::class, 'chat'])
    ->middleware(['auth'])
    ->name('chat.user');

Route::post('/chat/{chat}', [\App\Http\Controllers\ChatController::class, 'store'])
    ->middleware(['auth'])
    ->name('chat.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
