<?php

use App\Http\Controllers\TodosController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::middleware('auth')
//     ->group(function () {
//         Route::get('index', [TodosController::class, 'index'])->name('index');
//         Route::get('create', [TodosController::class, 'create'])->name('create');
//         Route::get('edit/{id}', [TodosController::class, 'edit'])->name('edit');
//         Route::put('update/{id}', [TodosController::class, 'update'])->name('update');
//     });

// Route::resource('todos', TodosController::class)
//     ->middleware('auth');

// Route::get('/', [TodosController::class, 'index'])
// ->middleware(['auth', 'verified'])
// ->name('index');

// Route::get('/edit{todo}', [TodosController::class, 'edit'])
//     ->middleware(['auth', 'verified'])
//     ->name('.edit');

// Route::get('/finished', function () {
//     return view('finished');
// })->middleware(['auth', 'verified'])->name('finished');

require __DIR__.'/auth.php';
