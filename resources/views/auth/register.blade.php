@extends('layouts.auth')

@section('title', 'Demande de Stand')

@section('content')
<div class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #fff6ee 0%, #fff6f2 100%);">
  <div class="w-full max-w-2xl bg-white p-10 rounded-2xl shadow-lg border border-gray-200">
    <div class="flex flex-col items-center mb-2 mt-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2">
        <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/>
        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/>
        <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/>
        <path d="M2 7h20"/>
        <path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/>
      </svg>
    </div>
    <h1 class="text-2xl font-bold text-center mb-2 text-gray-900">Demande de Stand</h1>
    <p class="text-center mb-8 text-gray-900">Inscrivez-vous pour devenir exposant à l'événement Eat&Drink</p>
    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      <div class="grid md:grid-cols-2 gap-4">
        <div>
          <label class="block font-semibold mb-1 text-black" for="nom_complet">Nom complet *</label>
          <input type="text" name="nom_complet" id="nom_complet" class="input w-full text-black bg-white border border-gray-300" placeholder="Jean Dupont" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-black-900" for="email">Email *</label>
          <input type="email" name="email" id="email" class="input w-full bg-white border border-gray-300 text-black" placeholder="jean@exemple.com" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-gray-900" for="password">Mot de passe *</label>
          <input type="password" name="password" id="password" class="input w-full bg-white border border-gray-300 text-black" placeholder="Minimum 8 caractères" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-gray-900" for="password_confirmation">Confirmer le mot de passe *</label>
          <input type="password" name="password_confirmation" id="password_confirmation" class="input w-full bg-white border text-black border-gray-300" placeholder="Répétez le mot de passe" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-gray-900" for="nom_entreprise">Nom de l'entreprise *</label>
          <input type="text" name="nom_entreprise" id="nom_entreprise" class="input w-full bg-white border border-gray-300 text-black" placeholder="La Boulangerie du Coin" required>
        </div>
        <div>
          <label class="block font-semibold mb-1 text-gray-900" for="type_activite">Type d'activité *</label>
          <input type="text" name="type_activite" id="type_activite" class="input w-full bg-white border border-gray-300 text-black" placeholder="Boulangerie, Restaurant, Artisan..." required>
        </div>
        <div class="md:col-span-2">
          <label class="block font-semibold mb-1 text-gray-900" for="telephone">Téléphone</label>
          <input type="tel" name="telephone" id="telephone" class="input w-full bg-white border border-gray-300 text-black" placeholder="01 23 45 67 89">
        </div>
      </div>

      <div>
        <label class="block font-semibold mb-1 text-gray-900" for="description_activite">Description de votre activité *</label>
        <textarea name="description_activite" id="description_activite" class="textarea w-full h-28 bg-white border border-gray-300" placeholder="Décrivez votre activité, vos spécialités, ce que vous proposerez sur votre stand..." required></textarea>
      </div>

      <input type="hidden" name="role" value="exposant">

      <div>
        <button type="submit" class="w-full py-3 rounded-lg bg-gray-900 text-white font-semibold text-base hover:bg-gray-800 transition">
          Envoyer la demande
        </button>
      </div>
    </form>
    <div class="text-center mt-6 text-sm">
      <p class="text-gray-600">
        Déjà inscrit ?
        <a href="{{ route('login') }}" class="text-orange-500 font-semibold hover:underline">
          Se connecter
        </a>
      </p>
    </div>
  </div>
</div>
@endsection
