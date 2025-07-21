<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ExposantController;
use App\Http\Controllers\Entrepreneur\ProduitController;

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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

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
Route::get('/entrepreneur/dashboard', [App\Http\Controllers\Entrepreneur\DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('entrepreneur.dashboard');

Route::resource('produits', ProduitController::class);

Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/auth/pending', function () {
    return view('auth.pending');
})->name('pending-approval');
