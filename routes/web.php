<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/student', [App\Http\Controllers\StudentController::class, 'index']);

Route::get('/add/student', [App\Http\Controllers\StudentController::class, 'openAddPage']);
Route::post('/add/student', [App\Http\Controllers\StudentController::class, 'create'])->name('create');

Route::get('/edit/{id}', [App\Http\Controllers\StudentController::class, 'edit']);
Route::post('/edit/student', [App\Http\Controllers\StudentController::class, 'update'])->name('update');

Route::get('/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete']);
