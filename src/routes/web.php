<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;


Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/thanks', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks']);

// Route::get('/admin', [AdminController::class, 'index'])
//     ->name('admin.index');
Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');

Route::get('/admin/{contact}', [AdminController::class, 'show'])
    ->name('admin.show');