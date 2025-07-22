<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>eat&drink</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="favicon.ico">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="https://unpkg.com/lucide@latest"></script>
    </head>
    <body>
        <div class="min-h-screen bg-gradient-to-br from-orange-50 to-red-50 ">
            <header>
                <div class="navbar bg-base-100 shadow-md px-6">
                    <!-- Partie gauche : logo + nom -->
                    <div class="navbar-start flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store-icon lucide-store text-orange-500"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>
                        <a class="text-2xl font-bold text-neutral">Eat&Drink - Admin</a>
                    </div>
                    <!-- Partie droite : liens de navigation -->
                    <div class="navbar-end hidden md:flex gap-6">
                        <p>
                            Bienvenue,Administrateur
                        </p>
                        <a class="btn btn-ghost text-base font-medium  btn-signin" routerLink="/contact">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-log-out-icon lucide-log-out"><path d="m16 17 5-5-5-5"/><path d="M21 12H9"/><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/></svg>
                            Déconnexion
                        </a>
                    </div>
                </div>
            </header>
            <div class="container mx-auto px-4 py-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-2">Tableau de bord Admin</h2>
                    <p class="text-gray-600">
                        Gérer les demandes de stands et les exposants
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Carte En attente -->
                <div class="card bg-base-100 border border-base-200 shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-sm font-medium">En attente</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-orange-500">
                                <path d="M12 6v6l4 2"/>
                                <circle cx="12" cy="12" r="10"/>
                            </svg>
                        </div>
                    <div class="mt-2">
                        <div class="text-2xl font-bold text-orange-600">3</div>
                            <p class="text-xs text-base-content/70">demandes à traiter</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Approuvées -->
                <div class="card bg-base-100 border border-base-200 shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-sm font-medium">Approuvées</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                                <path d="M20 6 9 17l-5-5"/>
                            </svg>
                        </div>
                        <div class="mt-2">
                            <div class="text-2xl font-bold text-green-600">0</div>
                            <p class="text-xs text-base-content/70">stands actifs</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Rejetées -->
                <div class="card bg-base-100 border border-base-200 shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-sm font-medium">Rejetées</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-500">
                                <path d="M18 6 6 18"/>
                                <path d="m6 6 12 12"/>
                            </svg>
                        </div>
                        <div class="mt-2">
                            <div class="text-2xl font-bold text-red-600">0</div>
                            <p class="text-xs text-base-content/70">demandes refusées</p>
                        </div>
                    </div>
                </div>

                <!-- Carte Total -->
                <div class="card bg-base-100 border border-base-200 shadow-sm">
                    <div class="card-body p-6">
                        <div class="flex justify-between items-center">
                            <h3 class="text-sm font-medium">Total</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-blue-500">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <path d="M16 3.128a4 4 0 0 1 0 7.744"/>
                                <path d="M22 21v-2a4 4 0 0 0-3-3.87"/>
                                <circle cx="9" cy="7" r="4"/>
                            </svg>
                        </div>
                        <div class="mt-2">
                            <div class="text-2xl font-bold text-blue-600">3</div>
                            <p class="text-xs text-base-content/70">demandes totales</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="rounded-lg bg-base-100 border-b border-base-200 shadow-sm mb-8">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clock-icon lucide-clock text-orange-500"><path d="M12 6v6l4 2"/><circle cx="12" cy="12" r="10"/></svg>
                        Demandes en attente d'approbation
                    </h3>
                    <p class="text-sm text-base-content/70">gérer les nouvelles demandes de stand des entrepreneurs</p>
                </div>
                <div class="p-6 pt-0">
                    <div class="relative w-full overflow-auto">
                        <table class="w-full caption-bottom text-sm">
                            <thead class="[&_tr]:border-b border-base-200">
                                <tr class="bg-base-100 border-b border-base-200">
                                    <th class="h-12 px-4 text-left align-middle font-medium ">Entrepreneur</th>
                                    <th class="h-12 px-4 text-left align-middle font-medium ">Entreprise</th>
                                    <th class="h-12 px-4 text-left align-middle font-medium ">Type</th>
                                    <th class="h-12 px-4 text-left align-middle font-medium ">Date</th>
                                    <th class="h-12 px-4 text-left align-middle font-medium ">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="[&_tr:last-child]:border-0">
                                @forelse ($unapproved as $user)
                                    <tr class="border-b border-base-200 transition-colors hover:bg-base-200/50 active:bg-base-200">
                                        <td class="h-12 align-middle text-left [&:has([role=checkbox])]:pr-0 p-4">
                                            <div>
                                                <div class="font-medium">
                                                    {{ $user->nom_complet }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    {{ $user->email }}
                                                </div>
                                            <div>
                                        </td>
                                        <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                                {{ $user->nom_entreprise }}
                                        </td>
                                        <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                            <div class="inline-flex items-center rounded-full border-b border-base-200 px-2.5 py-0.5 focus:ring-offset-2">
                                                {{ $user->type_activite }}
                                            </div>
                                        </td>
                                        <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                            {{ $user->created_at->format('Y-m-d') }}
                                        </td>
                                        <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                            <div class="flex space-x-2">
                                                <button  id="show" class="inline-flex items-center justify-center gap-2 whitespace-nowrap  hover:text-accent-content h-9 rounded-btn px-3">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-eye-icon lucide-eye"><path d="M2.062 12.348a1 1 0 0 1 0-.696 10.75 10.75 0 0 1 19.876 0 1 1 0 0 1 0 .696 10.75 10.75 0 0 1-19.876 0"/><circle cx="12" cy="12" r="3"/></svg>
                                                </button>
                                                <!-- Fenêtre modale -->
                                                <dialog id="stand_modal" class="modal">
                                                    <div class="modal-box max-w-2xl">
                                                        <h3 class="font-bold text-lg mb-4">Informations du Stand</h3>
                                                        
                                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                                            <!-- Colonne 1 -->
                                                            <div>
                                                                <div class="mb-3">
                                                                    <label class="block text-sm font-medium text-gray-500">Nom</label>
                                                                    <p class="mt-1 text-sm">{{ $user->nom_complet }} </p>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="block text-sm font-medium text-gray-500">Email</label>
                                                                    <p class="mt-1 text-sm"> {{ $user->email }} </p>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="block text-sm font-medium text-gray-500">Téléphone</label>
                                                                    <p class="mt-1 text-sm"> {{ $user->telephone }}</p>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Colonne 2 -->
                                                            <div>
                                                                <div class="mb-3">
                                                                    <label class="block text-sm font-medium text-gray-500">Entreprise</label>
                                                                    <p class="mt-1 text-sm">{{ $user->nom_entreprise }}</p>
                                                                </div>
                                                                
                                                                <div class="mb-3">
                                                                    <label class="block text-sm font-medium text-gray-500">Type</label>
                                                                    <p class="mt-1 text-sm">{{ $user->type_activite }}</p>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- Description (pleine largeur) -->
                                                        <div class="mt-4">
                                                            <label class="block text-sm font-medium text-gray-500">Description</label>
                                                            <p class="mt-1 text-sm">{{ $user->description_activite }}</p>
                                                        </div>
                                                        
                                                        <div class="modal-action">
                                                            <form method="dialog">
                                                                <button class="btn">Fermer</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Fermer en cliquant à l'extérieur -->
                                                    <form method="dialog" class="modal-backdrop">
                                                        <button>close</button>
                                                    </form>
                                                </dialog>
                                                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap  hover:text-accent-content h-9 rounded-btn px-3 text-green-600 hover:text-green-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check"><path d="M20 6 9 17l-5-5"/></svg>
                                                </button>
                                                <button class="inline-flex items-center justify-center gap-2 whitespace-nowrap  hover:text-accent-content h-9 rounded-btn px-3 text-red-600 hover:text-red-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-x-icon lucide-x"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                     <div class="p-6 pt-0">
                                        <p class="text-center text-gray-500 py-8">
                                            Aucune demande en attente
                                        </p>
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="rounded-lg border-b border-base-200 bg-card text-base-content shadow-sm">
                <div class="flex flex-col space-y-1.5 p-6">
                    <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-check-icon lucide-check text-green-500"><path d="M20 6 9 17l-5-5"/></svg>
                        Exposants approuvées
                    </h3>
                    <p class="text-sm text-muted-foreground">
                        Liste des stands actifs sur la plateforme
                    </p>
                </div>
                <div class="p-6 pt-0">
                    @if (isset($approved) && $approved->isNotEmpty())
                        <div class="relative w-full overflow-auto">
                            <table class="w-full caption-button text-sm">
                                <thead class="[&_tr]:border-b">
                                    <tr class="border-b border-base-200 transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                        <th class="h-12 px-4 text-left align-middle font-medium  text-base-content/70 [&:has([role=checkbox]):pr-0]">
                                            Entrepreneur
                                        </th>
                                        <th class="h-12 px-4 text-left align-middle font-medium  text-base-content/70 [&:has([role=checkbox]):pr-0]">
                                            Entreprise
                                        </th>
                                        <th class="h-12 px-4 text-left align-middle font-medium  text-base-content/70 [&:has([role=checkbox]):pr-0]">
                                            Type
                                        </th>
                                        <th class="h-12 px-4 text-left align-middle font-medium  text-base-content/70 [&:has([role=checkbox]):pr-0]">
                                            Statut
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="[&_tr:last-child]:border-0">
                                    @forelse ($approved as $user )
                                        <tr class="border-b border-base-200 transition-colors hover:bg-muted/50 data-[state=selected]:bg-muted">
                                            <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                                <div>
                                                    <div class="font-medium">

                                                    </div>
                                                    <div class="text-sm text-gray-500">

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                                
                                            </td>
                                            <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 focus:ring-ring focus:ring-offset-2 text-foreground">

                                                </div>
                                            </td>
                                            <td class="p-4 align-middle [&:has([role=checkbox])]:pr-0">
                                                <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 transparent bg-secondary hover:bg-secondary/80 text-green-600">

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        
                                    @endforelse
                                    
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-center text-gray-500 py-8">
                            Aucun exposant approuvé
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </body>
    <script>
        document.getElementById('show').addEventListener('click', function() {
            document.getElementById('stand_modal').showModal();
        });
    </script>
</html>