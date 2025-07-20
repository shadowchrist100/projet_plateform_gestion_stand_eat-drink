@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-orange-50 to-white" x-data="{ openModal: false }">
    <!-- Header -->
    <header class="flex justify-between items-center py-6 px-12 bg-white shadow-sm">
        <div class="flex items-center space-x-3">
            <!-- Logo SVG -->
            <span class="text-3xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-orange-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l9-4 9 4-9 4-9-4zm0 0v6a9 9 0 009 9 9 9 0 009-9V7"/>
                </svg>
            </span>
            <span class="text-2xl font-bold text-gray-800">Eat&Drink</span>
        </div>
        <div class="flex items-center space-x-6">
            <span class="text-gray-600">Bienvenue, <span class="font-semibold">{{ Auth::user()->name }}</span></span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="flex items-center px-4 py-2 border border-gray-300 rounded-lg font-semibold hover:bg-gray-100 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H7a2 2 0 01-2-2V7a2 2 0 012-2h4a2 2 0 012 2v1"/>
                    </svg>
                    Déconnexion
                </button>
            </form>
        </div>
    </header>

    <!-- Main -->
    <main class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold mb-2">Tableau de bord</h1>
        <p class="text-gray-500 mb-8">Gérez vos produits et votre stand</p>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <!-- Total Produits -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 font-medium">Total Produits</span>
                    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold mt-4">{{ $totalProduits ?? 0 }}</div>
                <div class="text-gray-400 text-sm">produits disponibles</div>
            </div>
            <!-- Prix Moyen -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 font-medium">Prix Moyen</span>
                    <span class="text-gray-300 text-xl font-bold">€</span>
                </div>
                <div class="text-3xl font-bold mt-4">{{ isset($prixMoyen) ? number_format($prixMoyen, 2) : '0.00' }}€</div>
                <div class="text-gray-400 text-sm">par produit</div>
            </div>
            <!-- Statut -->
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 font-medium">Statut</span>
                    <span class="px-3 py-1 bg-gray-100 text-gray-700 rounded-full text-xs font-semibold">Approuvé</span>
                </div>
                <div class="text-3xl font-bold text-green-600 mt-4">Actif</div>
                <div class="text-gray-400 text-sm">Stand approuvé</div>
            </div>
        </div>

        <!-- Tableau des produits -->
        <div class="bg-white rounded-xl shadow p-8">
            <div class="flex justify-between items-center mb-6">
                <div>
                    <h2 class="text-2xl font-bold">Mes Produits</h2>
                    <p class="text-gray-500">Gérez les produits de votre stand</p>
                </div>
                <button @click="openModal = true" type="button" class="flex items-center bg-gray-900 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-700 transition">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajouter un produit
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="text-left text-gray-500 border-b">
                            <th class="py-3">Produit</th>
                            <th class="py-3">Description</th>
                            <th class="py-3">Prix</th>
                            <th class="py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($produits ?? [] as $produit)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 font-semibold">{{ $produit->nom }}</td>
                            <td class="py-3">{{ $produit->description }}</td>
                            <td class="py-3">{{ number_format($produit->prix, 2) }}€</td>
                            <td class="py-3">
                                <div class="flex space-x-2">
                                    <a href="{{ route('produits.edit', $produit) }}" class="p-2 rounded hover:bg-gray-200" title="Modifier">
                                        <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13l6-6m2 2l-6 6m-2 2h2v2a2 2 0 002 2h2a2 2 0 002-2v-2h2a2 2 0 002-2v-2a2 2 0 00-2-2h-2v-2a2 2 0 00-2-2h-2a2 2 0 00-2 2v2H7a2 2 0 00-2 2v2a2 2 0 002 2z"/>
                                        </svg>
                                    </a>
                                    <form action="{{ route('produits.destroy', $produit) }}" method="POST" onsubmit="return confirm('Supprimer ce produit ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 rounded hover:bg-gray-200" title="Supprimer">
                                            <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modale d'ajout de produit -->
        <div
            x-show="openModal"
            style="background: rgba(0,0,0,0.5);"
            class="fixed inset-0 z-50 flex items-center justify-center"
        >
            <div
                @click.away="openModal = false"
                class="bg-white rounded-xl shadow-lg w-full max-w-lg p-8 relative"
            >
                <!-- Bouton fermer -->
                <button @click="openModal = false" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <h3 class="text-xl font-bold mb-1">Ajouter un nouveau produit</h3>
                <p class="text-gray-400 mb-6">Remplissez les informations du produit ci-dessous.</p>
                <form method="POST" action="{{ route('produits.store') }}">
                    @csrf
                    <div class="mb-4">
                        <label class="block font-semibold mb-1" for="nom">Nom du produit</label>
                        <input type="text" name="nom" id="nom" required class="w-full border border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>
                    <div class="mb-4">
                        <label class="block font-semibold mb-1" for="description">Description</label>
                        <textarea name="description" id="description" rows="3" class="w-full border border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300"></textarea>
                    </div>
                    <div class="mb-6">
                        <label class="block font-semibold mb-1" for="prix">Prix (€)</label>
                        <input type="number" step="0.01" name="prix" id="prix" required class="w-full border border-gray-400 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-300">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="openModal = false" class="px-4 py-2 rounded bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200">Annuler</button>
                        <button type="submit" class="px-4 py-2 rounded bg-gray-900 text-white font-semibold hover:bg-gray-700">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Fin modale -->
    </main>
</div>
@endsection
