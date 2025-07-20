<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    protected function authenticated(Request $request, $user)
    {
        // Si l'utilisateur est un entrepreneur approuvé
        if ($user->role === 'entrepreneur_approuve') {
            return redirect('/entrepreneur/dashboard');
        }
        // Si l'utilisateur est en attente d'approbation
        if ($user->role === 'entrepreneur_en_attente') {
            return redirect('/auth/pending');
        }
        // Si c'est un admin
        if ($user->role === 'admin') {
            return redirect('/admin/dashboard');
        }
        // Par défaut
        return redirect('/');
    }
}
