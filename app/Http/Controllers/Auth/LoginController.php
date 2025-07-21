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

    /**
     * Valider les données de connexion
     */
    protected function validator(array $data)
    {
        
    }

    public function login(Request $request)
    {

    }

}
