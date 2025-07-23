<?php

namespace App\Http\Controllers\Entrepreneur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produit;
use Illuminate\Support\Facades\Auth;

class ProduitController extends Controller
{
    // Affiche la liste des produits de l'entrepreneur connecté
    public function index()
    {
        $user = Auth::user();
        $produits = Produit::where('user_id', $user->id)->get();

        return view('entrepreneur.produits.index', compact('produits'));
    }

    // Affiche le formulaire de création d'un produit
    public function create()
    {
        return view('entrepreneur.produits.create');
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'prix' => 'required|numeric',
            'image_url' => 'nullable|image|max:2048', // max 2Mo
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        Produit::create([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image_url' => $imagePath,
            // 'user_id' => auth()->id(), // si besoin
            // 'stand_id' => ... // selon ta logique
        ]);

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Produit ajouté avec succès !');
    }

    // Affiche le formulaire d'édition d'un produit
    public function edit(Produit $produit)
    {
        // Vérifie que le produit appartient à l'utilisateur connecté
        if ($produit->user_id !== Auth::id()) {
            abort(403);
        }
        return view('entrepreneur.produits.edit', compact('produit'));
    }

    // Met à jour un produit
    public function update(Request $request, Produit $produit)
    {
        if ($produit->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
        ]);

        $produit->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
        ]);

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Produit modifié avec succès !');
    }

    // Supprime un produit
    public function destroy(Produit $produit)
    {
        if ($produit->user_id !== Auth::id()) {
            abort(403);
        }
        $produit->delete();

        return redirect()->route('entrepreneur.dashboard')->with('success', 'Produit supprimé avec succès !');
    }
}
