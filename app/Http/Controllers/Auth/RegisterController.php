<?php

namespace App\Http\Controllers\Auth;

use App\Notifications\WelcomeNotification;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Affiche le formulaire d'inscription
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Valide les données d'inscription
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom_complet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nom_entreprise' => ['required', 'string', 'max:255'],
            'type_activite' => ['required', 'string'],
            'description_activite' => ['required', 'string'],
            'telephone' => ['nullable', 'string'],
            'stand_image' => ['nullable', 'image', 'max:2048'], // Added validation for image
        ]);
    }

    /**
     * Crée un nouvel utilisateur
     */
    protected function create(array $data)
    {
        return User::create([
            'nom_complet' => $data['nom_complet'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nom_entreprise' => $data['nom_entreprise'],
            'type_activite' => $data['type_activite'],
            'telephone' => $data['telephone'] ?? null,
            'description_activite' => $data['description_activite'],
            'role' => 'entrepreneur_en_attente',
            'status' => 'pending',
            'image' => $data['stand_image'] ?? null,
        ]);
    }

    /**
     * Traite la demande d'inscription
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // Gère l'upload ici
        if ($request->hasFile('stand_image')) {
            $standImagePath = $request->file('stand_image')->store('stands', 'public');
        } else {
            $standImagePath = null;
        }

        // Passe le chemin de l'image à create()
        $user = $this->create(array_merge(
            $request->all(),
            ['stand_image' => $standImagePath]
        ));

        // Envoi de la notification de bienvenue
        $user->notify(new WelcomeNotification());
        return redirect()->route('pending-approval');
    }
}
