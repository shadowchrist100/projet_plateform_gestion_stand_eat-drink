<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validated=$request->validate([
            'email'=>['required','exists:users,email','email'],
            'password'=>['required',Password::min(8)]
        ]);
        if (Auth::attempt($validated)) 
        {
            return redirect()->route('pending-approval');
        }
        else
        {
            dd("Erreur");
        }
    }

}
