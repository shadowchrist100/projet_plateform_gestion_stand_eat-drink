<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Entrepreneur\ProduitController;

Route::get('/', function () {
    return view('welcome');
});

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