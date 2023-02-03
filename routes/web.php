<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepartementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('users')->group(function () {
    Route::get('/index', [UserController::class, 'index'])->name('users.index');
    Route::get('/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('/update', [UserController::class, 'update'])->name('users.update');
    Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

Route::prefix('departements')->group(function () {
    Route::get('/index', [DepartementController::class, 'index'])->name('departements.index');
    Route::get('/create', [DepartementController::class, 'create'])->name('departements.create');
    Route::post('/store', [DepartementController::class, 'store'])->name('departements.store');
    Route::get('/edit/{id}', [DepartementController::class, 'edit'])->name('departements.edit');
    Route::post('/update', [DepartementController::class, 'update'])->name('departements.update');
    Route::get('/delete/{id}', [DepartementController::class, 'destroy'])->name('departements.delete');
});

Route::prefix('roles')->group(function () {
    Route::get('/index', [RoleController::class, 'index'])->name('roles.index');
    Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
    Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
    Route::post('/update', [RoleController::class, 'update'])->name('roles.update');
    Route::get('/delete/{id}', [RoleController::class, 'destroy'])->name('roles.delete');
});
