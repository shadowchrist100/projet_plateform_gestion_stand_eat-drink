@extends('layouts.auth')

@section('title', 'Demande de Stand')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
  <h1 class="text-2xl font-bold text-center mb-6">Demande de Stand</h1>
  <p class="text-center mb-8">Inscrivez-vous pour devenir exposant à l'événement Eat&Drink</p>

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

    <!-- Section 2: Entreprise -->
    <div class="space-y-4">
      <div class="form-control">
        <label class="label">
          <span class="label-text">Nom de l'entreprise </span>
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
    <div class="space-y-4">
        <label class="label">
          <span class="label-text">Description de l'activite</span>
        </label>
      <textarea name="description_activite" class="textarea textarea-bordered w-full h-32" placeholder="Décrivez votre activité, vos spécialités, ce que vous proposerez sur votre stand..." required></textarea>
    </div>

    <!-- Champ caché pour le rôle -->
    <input type="hidden" name="role" value="exposant">

    <div class="pt-4">
      <button type="submit" class="btn btn-primary w-full">Soumettre</button>
    </div>
  </form>

  <div class="text-center mt-6">
    <p>Déjà inscrit ? <a href="view-login" class="text-primary hover:underline">Se connecter</a></p>
  </div>
</div>
@endsection