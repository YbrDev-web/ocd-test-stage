<?php

use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('people')->name('people.')->group(function () {
    // Route pour afficher la liste des personnes
    Route::get('/', [PersonController::class, 'index'])->name('index');

    // Route pour afficher une personne spécifique
    Route::get('/{id}', [PersonController::class, 'show'])->name('show');

    // Route pour afficher le formulaire de création d'une personne
    Route::get('/create', [PersonController::class, 'create'])->name('create');

    // Route pour enregistrer une nouvelle personne
    Route::post('/', [PersonController::class, 'store'])->name('store');
});
