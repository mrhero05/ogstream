<?php

use App\Http\Controllers\FilmController;
use App\Http\Controllers\HomepageController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware('tmdb')->group(function () {
});
Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
