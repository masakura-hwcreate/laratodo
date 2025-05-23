<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/todos/finished', [TodosController::class, 'finished'])->name('todos.finished');

Route::resource('todos', TodosController::class)
->middleware('auth');

// Route::get('/todos/finished', [TodosController::class, 'finished'])->name('todos.finished');



// Route::get('/todos', function () {
//     return view('todos.index');
// })->middleware(['auth', 'verified'])->name('todos.index');

// Route::get('/finished', function () {
//     return view('finished');
// })->middleware(['auth', 'verified'])->name('finished');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
