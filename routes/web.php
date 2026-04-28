<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
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

    Route::controller(CategoryController::class)->prefix('categories')->group(function () {
        Route::get('/', 'index')->name('categories.index');
        Route::get('/create', 'create')->name('categories.create');
        Route::post('/store', 'store')->name('categories.store');
        Route::get('/{category}', 'show')->name('categories.show');
        Route::get('/{category}/edit', 'edit')->name('categories.edit');
        Route::put('/{category}/update', 'update')->name('categories.update');
        Route::delete('/{category}/delete', 'destroy')->name('categories.delete');
    });

    Route::controller(TaskController::class)->prefix('categories')->group(function () {
        Route::get('{category}/create', 'create')->name('categories.task.create');
        Route::post('{category}/store', 'store')->name('categories.task.store');
        Route::get('/{category}/{task}/edit', 'edit')->name('categories.task.edit');
        Route::put('/{category}/{task}/update', 'update')->name('categories.task.update');
        Route::delete('/{category}/{task}/delete', 'destroy')->name('categories.task.delete');
    });
});

require __DIR__.'/auth.php';
