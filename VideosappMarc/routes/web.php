<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideosController;

// Ruta de l'índex de vídeos (accessible tant si estàs logejat com si no)
Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');

// Ruta per mostrar un vídeo específic
Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');

// Ruta de benvinguda
Route::get('/', function () {
    return view('welcome');
});

// Rutes del CRUD de vídeos (només accessibles quan estàs logejat)
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/videos/create', [VideosController::class, 'create'])->name('videos.create');
    Route::post('/videos', [VideosController::class, 'store'])->name('videos.store');
    Route::get('/videos/{video}/edit', [VideosController::class, 'edit'])->name('videos.edit');
    Route::put('/videos/{video}', [VideosController::class, 'update'])->name('videos.update');
    Route::delete('/videos/{video}', [VideosController::class, 'destroy'])->name('videos.destroy');
});
