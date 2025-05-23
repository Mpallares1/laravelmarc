<?php

use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeriesManageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersManageController;
use App\Http\Controllers\VideosManageController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationsController;



Route::get('/', [VideosController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::middleware(['auth', 'can:manage-videos'])->group(function () {
        Route::get('/videosmanage', [VideosManageController::class, 'index'])->name('videos.manage.index');
        Route::get('/videosmanage/create', [VideosManageController::class, 'create'])->name('videos.manage.create');
        Route::post('/videosmanage', [VideosManageController::class, 'store'])->name('videos.manage.store');
        Route::get('/videosmanage/{id}/edit', [VideosManageController::class, 'edit'])->name('videos.manage.edit');
        Route::put('/videosmanage/{id}', [VideosManageController::class, 'update'])->name('videos.manage.update');
        Route::delete('/videosmanage/{id}', [VideosManageController::class, 'destroy'])->name('videos.manage.destroy');
    });

    Route::middleware(['auth', 'can:admmistradorUsuaris'])->group(function () {
        Route::get('/users/manage', [UsersManageController::class, 'index'])->name('users.manage.index');
        Route::get('/users/manage/create', [UsersManageController::class, 'create'])->name('users.manage.create');
        Route::post('/users/manage', [UsersManageController::class, 'store'])->name('users.manage.store');
        Route::get('/users/manage/{id}/edit', [UsersManageController::class, 'edit'])->name('users.manage.edit');
        Route::put('/users/manage/{id}', [UsersManageController::class, 'update'])->name('users.manage.update');
        Route::delete('/users/manage/{id}', [UsersManageController::class, 'destroy'])->name('users.manage.destroy');
    });

    Route::middleware(['auth', 'can:manageseries'])->group(function () {
        Route::get('/series/manage', [SeriesManageController::class, 'index'])->name('series.manage.index');
        Route::get('/series/manage/create', [SeriesManageController::class, 'create'])->name('series.manage.create');
        Route::post('/series/manage', [SeriesManageController::class, 'store'])->name('series.manage.store');
        Route::get('/series/manage/{id}/edit', [SeriesManageController::class, 'edit'])->name('series.manage.edit');
        Route::put('/series/manage/{id}', [SeriesManageController::class, 'update'])->name('series.manage.update');
        Route::delete('/series/manage/{id}', [SeriesManageController::class, 'destroy'])->name('series.manage.destroy');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
        Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
        Route::post('/series/{series}/videos', [SeriesController::class, 'addVideo'])->name('series.addVideo');
    });


    Route::get('/notifications', [NotificationsController::class, 'index'])->name('notifications.index');

    Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
    Route::get('/series/{id}', [SeriesController::class, 'show'])->name('series.show');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');
});
Route::resource('videos', VideoController::class);
Route::get('/videos', [VideosController::class, 'index'])->name('videos.index');
Route::get('/videos/{id}', [VideosController::class, 'show'])->name('videos.show');

