<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

