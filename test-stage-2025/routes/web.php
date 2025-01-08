<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\UpdateController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//route permettant l'appelle des diffèrentes pages de l'application via le controller
Route::get('/people', [PersonController::class, 'index'])->name('people.index');
Route::get('/people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('/people', [PersonController::class, 'store'])->name('people.store');
Route::get('/people/{id}', [PersonController::class, 'show'])->name('people.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
Route::get('/people/{id}/update', [UpdateController::class, 'edit'])->name('people.update');
Route::put('/people/update', [UpdateController::class, 'edit'])->name('people.update');
Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [registerController::class, 'register'])->name('register');

