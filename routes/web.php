<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class, 'index']);
Route::get('/project/{project}',[HomeController::class, 'project']);

Route::get('/login',  function ()
{
    return view('login');
});

Route::get('/dashboard', [AdminController::class, 'index']);
