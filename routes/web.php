<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store');

Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');
