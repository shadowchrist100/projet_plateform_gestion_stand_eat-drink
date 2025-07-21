<?php

namespace App\Http\Controllers\Entrepreneur;
use Illuminate\Http\Request;

class MonStandController
{
    public function produits()
{
    $produits = auth()->user()->produits;
    return view('entrepreneur.produits.index', compact('produits'));
}

public function createProduit()
{
    return view('entrepreneur.produits.create');
}

public function storeProduit(Request $request)
{
    $request->validate([
        'nom' => 'required|string|max:255',
        'description' => 'required|string',
        'prix' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);
    
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('produits', 'public');
    }
    
    auth()->user()->produits()->create([
        'nom' => $request->nom,
        'description' => $request->description,
        'prix' => $request->prix,
        'image_url' => $imagePath,
    ]);
    
    return redirect()->route('entrepreneur.produits')->with('success', 'Produit ajouté avec succès');
}
}
