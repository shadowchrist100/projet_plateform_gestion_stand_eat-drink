<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin',function(){
    return view('admin.dashboard');
});

Route::get('/login',function(){
    return view('auth.login');
});

Route::get('/register',function(){
    return view('auth.register');
});

Route::get('/entrepreneur',function(){
    return view('entrepreneur.dashboard');
});