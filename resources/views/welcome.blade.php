
@extends('layouts.app')

@section('title', 'Accueil')

@section('content')
    <section class="flex items-center justify-center h-[50vh] container ml-4 bg-gradient-to-r from-orange-100 to-red-100" >
        <div class="text-center  max-w-4xl px-4 " >
            <h1 class="font-bold text-gray-900 text-5xl mb-6" >Bienvenue à l'événement <span class="text-orange-600" >Eat&Drink</span></h1>
            <p class="text-xl text-gray-700 mb-8 max-w-2xl ml-22" >Découvrez les meilleurs artisans et restaurateurs de la région. Goûtez, achetez et vivez une expérience culinaire unique.</p>
            <div class="flex justify-center gap-4" >
                <a class="bg-orange-600 btn text-white btn-xs sm:btn-sm md:btn-md lg:btn-md xl:btn-md" href="{{ route('exposants.index') }}">Découvrir nos Exposants</a>
                <a class="btn btn-outline border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white px-6 py-3 rounded-lg transition-colors" href="{{ route('register') }}">Devenir Exposant</a>
            </div>
        </div>
    </section>
    <section class="container mx-auto px-4 py-8" >
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 sm:gap-8">
            <div class="h-[40vh] bg-base-100 text-base-content backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20 flex flex-col items-center text-center">
                <span class="text-orange-500 text-4xl mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-calendar-icon lucide-calendar"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                </span>
                <h3 class="text-xl font-bold  mb-2">Date de l'événement</h3>
                <p class=" font-medium">15-17 Décembre 202</p>
                <p class="">Vendredi à Dimanche</p>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20 flex flex-col items-center text-center">
                <span class="text-orange-500 text-2xl mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-map-pin-icon lucide-map-pin"><path d="M20 10c0 4.993-5.539 10.193-7.399 11.799a1 1 0 0 1-1.202 0C9.539 20.193 4 14.993 4 10a8 8 0 0 1 16 0"/><circle cx="12" cy="10" r="3"/></svg>
                </span>
                <h3 class="text-xl font-bold  mb-2">Lieu</h3>
                <p class="font-medium">Palais des Congrès</p>
                <a href="#" class="mt-2 text-orange-400 hover:text-orange-300 text-sm flex items-center justify-center">
                    Voir sur la carte <i class="fas fa-arrow-right ml-1 text-xs"></i>
                </a>
            </div>
            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 shadow-lg border border-white/20 flex flex-col items-center text-center">
                <span class="text-orange-500 text-2xl mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-users-icon lucide-users"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><path d="M16 3.128a4 4 0 0 1 0 7.744"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><circle cx="9" cy="7" r="4"/></svg>
                </span>
                <h3 class="text-xl font-bold  mb-2">Participants</h3>
                <p class=" font-medium">Plus de 50 exposants</p>
                <p class="">Artisans et restaurateurs</p>
            </div>
        </div>
    </section>
    <section class="py-16 bg-gradient-to-r from-orange-100 to-red-100">
        <div class="container mx-auto px-4">
            <h3 class="text-3xl font-bold text-center mb-12 text-gray-900">Ce qui vous attend</h3>
    
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Carte Artisanat -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-lg badge-primary">Artisanat</span>
                        </div>
                        <p class="mt-3 text-gray-600">Découvrez les créations uniques de nos artisans locaux</p>
                    </div>
                </div>

                <!-- Carte Gastronomie -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-lg badge-secondary">Gastronomie</span>
                        </div>
                        <p class="mt-3 text-gray-600">Savourez les spécialités de nos restaurateurs</p>
                    </div>
                </div>

                <!-- Carte Commande -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-lg badge-accent">Commande</span>
                        </div>
                        <p class="mt-3 text-gray-600">Commandez directement depuis la plateforme</p>
                    </div>
                </div>

                <!-- Carte Livraison -->
                <div class="card bg-base-100 shadow-md hover:shadow-lg transition-shadow">
                    <div class="card-body">
                        <div class="flex items-center gap-3">
                            <span class="badge badge-lg badge-info">Livraison</span>
                        </div>
                        <p class="mt-3 text-gray-600">Récupérez vos commandes sur place</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection