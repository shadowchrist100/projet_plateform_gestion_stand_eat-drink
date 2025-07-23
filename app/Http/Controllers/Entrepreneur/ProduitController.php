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
        if (!$user) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter.');
        }
        // Récupère les produits liés à l'utilisateur connecté
        $produits = Produit::where('user_id', $user->id)->get();
        $totalProduits = $produits->count();
        $prixMoyen = $totalProduits > 0 ? $produits->avg('prix') : 0;

        return view('entrepreneur.dashboard', [
            'user' => $user,
            'produits' => $produits,
            'totalProduits' => $totalProduits,
            'prixMoyen' => $prixMoyen,
        ]);
    }

    public function listProduits(){
        $user = Auth::user();
        $produits = Produit::where('user_id', $user->id)->get();
        $totalProduits = $produits->count();
        $prixMoyen = $totalProduits > 0 ? $produits->avg('prix') : 0;
       return view('entrepreneur.dashboard', compact('produits','totalProduits','prixMoyen'));  
}

    // Affiche le formulaire de création d'un produit
    public function create()
    {
        return view('entrepreneur.produits.create');
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
        $user = Auth::user();
        $user_id = $user->id;
        $stand_id = $user->stand_id ?? null;

        if (!$stand_id) {
            return redirect()->back()->with('error', 'Vous devez d\'abord créer un stand avant d\'ajouter un produit.');
        }
        
        $request->validate([
            'nom' => 'required',
            'description' => 'nullable',
            'prix' => 'required|numeric|min:0|max:9999999999.99',
            'image' => 'nullable|image|max:2048', // max 2Mo
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
            'user_id' => $user_id,
            'stand_id' => $stand_id
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
            'image_url' => 'nullable|image|max:2048',
        ]);

        $imagePath = $produit->image_url;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produits', 'public');
        }

        $produit->update([
            'nom' => $request->nom,
            'description' => $request->description,
            'prix' => $request->prix,
            'image_url' => $imagePath,
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
