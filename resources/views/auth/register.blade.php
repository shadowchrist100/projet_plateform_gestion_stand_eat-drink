@extends('layouts.auth')

@section('title', 'Demande de Stand')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 px-4">
  <div class="w-full max-w-2xl bg-white p-10 rounded-2xl shadow-lg border border-gray-200">
<div class="max-w-2xl w-full border border-base-200 bg-base-100 text-base-content p-8 rounded-lg shadow-md">
  <div class="flex flex-col space-y-1.5 p-6 text-center ">
    <div class="flex justify-center mb-4">
      <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-store-icon lucide-store text-orange-500"><path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/><path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/><path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/><path d="M2 7h20"/><path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/></svg>
    </div>
    <h1 class="text-2xl font-bold text-center mb-6">Demande de Stand</h1>
  <p class="text-center mb-8">Inscrivez-vous pour devenir exposant à l'événement Eat&Drink</p>

    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold text-primary">Demande de Stand</h1>
      <p class="text-gray-500 mt-2">Inscrivez-vous pour devenir exposant à l'événement Eat&Drink</p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="space-y-6">
      @csrf

      <!-- Section 1: Informations personnelles -->
      <div class="space-y-4">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Nom complet</span>
          </label>
          <input type="text" name="nom_complet" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Email</span>
          </label>
          <input type="email" name="email" class="input input-bordered w-full" required>
        </div>

        <div class="grid md:grid-cols-2 gap-4">
          <div class="form-control">
            <label class="label">
              <span class="label-text">Mot de passe</span>
            </label>
            <input type="password" name="password" class="input input-bordered w-full" required>
          </div>

          <div class="form-control">
            <label class="label">
              <span class="label-text">Confirmer le mot de passe</span>
            </label>
            <input type="password" name="password_confirmation" class="input input-bordered w-full" required>
          </div>
        </div>
      </div>

      <!-- Section 2: Informations entreprise -->
      <div class="space-y-4">
        <div class="form-control">
          <label class="label">
            <span class="label-text">Nom de l'entreprise</span>
          </label>
          <input type="text" name="nom_entreprise" class="input input-bordered w-full" required>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Type d'activité</span>
          </label>
          <select name="type_activite" class="select select-bordered w-full" required>
            <option value="">Sélectionnez...</option>
            <option value="Boulangerie">Boulangerie</option>
            <option value="Restaurant">Restaurant</option>
            <option value="Artisanat">Artisanat alimentaire</option>
            <option value="Vignoble">Vignoble</option>
            <option value="Brasserie">Brasserie</option>
          </select>
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">Téléphone</span>
          </label>
          <input type="tel" name="telephone" class="input input-bordered w-full">
        </div>
      </div>

      <!-- Section 3: Description -->
      <div class="form-control">
        <label class="label">
          <span class="label-text">Description de l'activité</span>
        </label>
        <textarea name="description_activite" class="textarea textarea-bordered w-full h-32" placeholder="Décrivez votre activité, vos spécialités, ce que vous proposerez sur votre stand..." required></textarea>
      </div>

      <!-- Champ caché pour le rôle -->
      <input type="hidden" name="role" value="exposant">

      <div>
        <button type="submit" class="btn btn-primary w-full">
          Soumettre la demande
        </button>
      </div>
    </form>

    <div class="text-center mt-6 text-sm">
      <p class="text-gray-600">
        Déjà inscrit ?
        <a href="{{ route('login') }}" class="text-secondary font-semibold hover:underline">
          Se connecter
        </a>
      </p>
    </div>

  </div>
  </div>
  
</div>
@endsection
