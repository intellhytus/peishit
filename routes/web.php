<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

Route::get('/clear-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');

    return "Caches limpos!";
});

Route::view('/', 'chirps')->middleware(['auth']);

Route::get('/chirps',[\App\Http\Controllers\ChirpController::class,'index'])
    ->middleware(['auth'])
    ->name('chirps');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/logout',\App\Livewire\Actions\Logout::class)->name('logout');

require __DIR__.'/auth.php';
