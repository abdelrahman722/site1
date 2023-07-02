<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AskController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// site routes
Route::get('/',[HomeController::class, 'index']);
Route::get('/project/{project}',[HomeController::class, 'project']);

// dashboard routes
Route::get('/signin', [AdminController::class, 'signin'])->middleware('guest:admin')->name('sign');
Route::post('/signin', [AdminController::class, 'checkSignin'])->middleware('guest:admin')->name('signin');
Route::get('/dashboard', [SettingController::class, 'index']);
Route::post('/dashboard', [SettingController::class, 'update'])->name('save.setting');
// admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/admin', [AdminController::class, 'store'])->name('admin.store');
Route::post('/admin/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::post('/admin/{admin}', [AdminController::class, 'update'])->name('admin.update');
// project
Route::get('/project', [ProjectController::class, 'index'])->name('project.index');
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');
Route::post('/project/destroy', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::post('/project/{project}', [ProjectController::class, 'update'])->name('project.update');
// client
Route::get('/client', [ClientController::class, 'index'])->name('client.index');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');
Route::post('/client/destroy', [ClientController::class, 'destroy'])->name('client.destroy');
Route::post('/client/{client}', [ClientController::class, 'update'])->name('client.update');
// service
Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
Route::post('/service', [ServiceController::class, 'store'])->name('service.store');
Route::post('/service/destroy', [ServiceController::class, 'destroy'])->name('service.destroy');
Route::post('/service/{service}', [ServiceController::class, 'update'])->name('service.update');
// team
Route::get('/team', [TeamController::class, 'index'])->name('team.index');
Route::post('/team', [TeamController::class, 'store'])->name('team.store');
Route::post('/team/destroy', [TeamController::class, 'destroy'])->name('team.destroy');
Route::post('/team/{team}', [TeamController::class, 'update'])->name('team.update');
// ask
Route::get('/ask', [AskController::class, 'index'])->name('ask.index');
Route::post('/ask', [AskController::class, 'store'])->name('ask.store');
Route::post('/ask/destroy', [AskController::class, 'destroy'])->name('ask.destroy');
Route::post('/ask/{ask}', [AskController::class, 'update'])->name('ask.update');

Auth::routes();
