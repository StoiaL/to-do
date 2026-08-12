<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\SQLiController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/todos', [TodoController::class, 'index'])->name('todos.index');

Route::get('/todos/create', [TodoController::class, 'create'])->name('todos.create');

Route::post('/todos', [TodoController::class, 'store'])->name('todos.store'); //post= delete

Route::delete('/todos/{todo}', [TodoController::class, 'destroy'])->name('todos.destroy');

Route::put('/todos/{todo}', [TodoController::class, 'update'])->name('todos.update'); //put = update

Route::get('/todos/SQLi', [SQLiController::class, 'index'])->name('sqli.index');

Route::post('/todos/SQLi', [SQLiController::class, 'execute'])->name('sqli.execute');
