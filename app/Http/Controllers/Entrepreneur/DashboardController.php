<?php

namespace App\Http\Controllers\Entrepreneur;

use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class DashboardController
{
    public function index()
    {
        if (Auth::user()->role !== 'entrepreneur_approuve') {
           return redirect()->route('pending-approval');
        }

        $user = Auth::user();

        // Récupérer les produits de l'entrepreneur connecté
        $produits = Produit::where('user_id', $user->id)->get();

        // Nombre total de produits
        $totalProduits = $produits->count();

        // Prix moyen
        $prixMoyen = $totalProduits > 0 ? $produits->avg('prix') : 0;

        return view('entrepreneur.dashboard', [
            'user' => $user,
            'produits' => $produits,
            'totalProduits' => $totalProduits,
            'prixMoyen' => $prixMoyen,
        ]);
    }
}
