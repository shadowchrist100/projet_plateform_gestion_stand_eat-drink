<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

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
            $email=$request->input('email');
            $user = User::where('email', $email)->first();
            if ($user) 
            {
                if ($user->status=='pending' && $user->role='') 
                {
                    return redirect()->route('pending-approval');
                }
                else if($user->status=='approved')
                {
                    return redirect('/entrepreneur');
                }
                else if($user->role='admin')
                {
                    return redirect()->route('admin.dashboard');
                }
            }
            
        }
        else
        {
            dd("Erreur");
        }
    }

  }
