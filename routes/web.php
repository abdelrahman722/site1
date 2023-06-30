<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// site routes
Route::get('/',[HomeController::class, 'index']);
Route::get('/project/{project}',[HomeController::class, 'project']);

// dashboard routes
Route::get('/signin', [AdminController::class, 'signin'])->middleware('guest:admin')->name('sign');
Route::post('/signin', [AdminController::class, 'checkSignin'])->middleware('guest:admin')->name('signin');
Route::get('/dashboard', [AdminController::class, 'index']);
