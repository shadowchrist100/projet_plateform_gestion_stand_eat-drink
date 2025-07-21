<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExposantController extends Controller
{
    /**
     * Affiche la liste des exposants avec possibilité de recherche
     */
    public function index(Request $request)
    {
        $query = $request->input('q');
        
        $exposants = User::approvedEntrepreneurs()
                        ->when($query, function($q) use ($query) {
                            return $q->where('nom_entreprise', 'LIKE', "%$query%")
                                   ->orWhere('description_activite', 'LIKE', "%$query%");
                        })
                        ->orderBy('nom_entreprise')
                        ->paginate(12);

        return view('exposants.index', compact('exposants', 'query'));
    }

    /**
     * Affiche les détails d'un exposant
     */
    public function show($id)
    {
        $exposant = User::approvedEntrepreneurs()
                        ->with(['produits' => function($q) {
                            $q->orderBy('nom');
                        }])
                        ->findOrFail($id);

        return view('exposants.show', compact('exposant'));
    }
}