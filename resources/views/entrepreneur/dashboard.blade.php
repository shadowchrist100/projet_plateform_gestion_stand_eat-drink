@extends('layouts.dash_head')

@section('contentd')
<div class="min-h-screen bg-gradient-to-b from-orange-50 to-white">
    <!-- Header -->
    


    <!-- Main -->
    <main class="max-w-6xl mx-auto py-10 px-4">
        <h1 class="text-4xl font-bold mb-2">Tableau de bord</h1>
        <p class="text-gray-500 mb-8">Gérez vos produits et votre stand</p>

        <!-- Statistiques -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 font-medium">Total Produits</span>
                    <svg class="w-6 h-6 text-gray-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16 0H4"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold mt-4">0</div>
                <div class="text-gray-400 text-sm">produits disponibles</div>
            </div>
            <div class="bg-white rounded-xl shadow p-6 flex flex-col">
                <div class="flex items-center justify-between">
                    <span class="text-gray-500 font-medium">Prix Moyen</span>
                    <span class="text-gray-300 text-xl font-bold">franc CFA</span>
                </div>
                <div class="text-3xl font-bold mt-4">0,00 franc CFA</div>
                <div class="text-gray-400 text-sm">par produit</div>
            </div>
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
                <button id="openModalBtn" type="button" class="flex items-center bg-gray-900 text-white px-6 py-2 rounded-lg font-semibold hover:bg-gray-700 transition">
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
                        <tr class="border-b hover:bg-gray-50">
                            <td class="py-3 font-semibold">Exemple produit</td>
                            <td class="py-3">Description exemple</td>
                            <td class="py-3">0 franc CFA</td>
                            <td class="py-3">
                                <div class="flex space-x-2">
                                    
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modale d'ajout de produit -->
        <div
            id="modalAjoutProduit"
            style="display: none; background: rgba(0,0,0,0.5);"
            class="fixed inset-0 z-50 flex items-center justify-center"
        >
            <div
                class="bg-white rounded-xl shadow-lg w-full max-w-lg p-8 relative"
            >
                <!-- Bouton fermer -->
                <button id="closeModalBtn" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
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
                        <button type="button" id="cancelModalBtn" class="px-4 py-2 rounded bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200">Annuler</button>
                        <button type="submit" class="px-4 py-2 rounded bg-gray-900 text-white font-semibold hover:bg-gray-700">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Fin modale -->
    </main>
</div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('modalAjoutProduit');
        const openBtn = document.getElementById('openModalBtn');
        const closeBtn = document.getElementById('closeModalBtn');
        const cancelBtn = document.getElementById('cancelModalBtn');

        openBtn.addEventListener('click', function () {
            modal.style.display = 'flex';
        });

        closeBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        cancelBtn.addEventListener('click', function () {
            modal.style.display = 'none';
        });

        // fermer la modale si on clique à l'extérieur
        window.addEventListener('click', function (e) {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>

