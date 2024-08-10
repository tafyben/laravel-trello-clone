<?php

use App\Livewire\BoardShow;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::get('/boards/{board}', BoardShow::class)->middleware(['auth'])->name('boards.show');

Route::get('/dashboard', \App\Livewire\BoardIndex::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
