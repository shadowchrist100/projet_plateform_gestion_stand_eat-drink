<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExposantController;

Route::get('/', function () {
    return view('welcome');
});

// Connexion
Route::controller(LoginController::class)->group(function() {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'login');
});

// Inscription
Route::controller(RegisterController::class)->group(function() {
    Route::get('register', 'showRegistrationForm')->name('register');
    Route::post('register', 'register');
});

// Déconnexion
Route::post('/logout', [LoginController::class, 'logout'])
     ->name('logout');

Route::get('/admin',function(){
    return view('admin.dashboard');
});

Route::get('/entrepreneur',function(){
    return view('entrepreneur.dashboard');
});

// Routes exposants simplifiées
Route::prefix('exposants')->group(function() {
    // Liste des exposants avec recherche intégrée
    Route::get('/', [ExposantController::class, 'index'])
         ->name('exposants.index');
    
    // Détail d'un exposant
    Route::get('/{id}', [ExposantController::class, 'show'])
         ->name('exposants.show');
});