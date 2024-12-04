<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'chirps')->middleware(['auth']);

Route::get('/chirps',[\App\Http\Controllers\ChirpController::class,'index'])
    ->middleware(['auth'])
    ->name('chirps');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/logout',\App\Livewire\Actions\Logout::class)->name('logout');

require __DIR__.'/auth.php';
