<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Models\Type;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/',[DashboardController::class, 'index'])
        ->name('dashboard');
    });

    //Rotte per PostController
Route::resource('posts', PostController::class);
    //->middleware('auth', 'verified');

Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');
Route::put('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');

//Rotte per ProjectController
Route::resource('projects', ProjectController::class)
    ->middleware('auth', 'verified');

    Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
    Route::put('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');

//Rotte per TypeController
Route::resource('types', TypeController::class)
    ->middleware('auth', 'verified');

    Route::put('/types/{id}', [TypeController::class, 'update'])->name('types.update');
    Route::put('/types/{id}/edit', [TypeController::class, 'edit'])->name('types.edit');



require __DIR__.'/auth.php';
