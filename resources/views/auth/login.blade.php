@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
  <div class="text-center mb-8">
    <h1 class="text-2xl font-bold text-primary mb-2">Connexion</h1>
    <p class="text-gray-600">Connectez-vous à votre compte Eat&Drink</p>
  </div>

  <form method="POST" action="{{ route('login') }}" class="space-y-6">
    @csrf

    <!-- Champ Email -->
    <div class="form-control">
      <label class="label">
        <span class="label-text">Email</span>
      </label>
      <input type="email" name="email" value="{{ old('email') }}" 
             class="input input-bordered w-full @error('email') input-error @enderror">
      @error('email')
        <label class="label">
          <span class="label-text-alt text-error">{{ $message }}</span>
        </label>
      @enderror
    </div>

    <!-- Champ Mot de passe -->
    <div class="form-control">
      <label class="label">
        <span class="label-text">Mot de passe</span>
      </label>
      <input type="password" name="password" 
             class="input input-bordered w-full @error('password') input-error @enderror">
      @error('password')
        <label class="label">
          <span class="label-text-alt text-error">{{ $message }}</span>
        </label>
      @enderror
    </div>

    <!-- Bouton de connexion -->
    <div class="pt-2">
      <button type="submit" class="btn btn-primary w-full">
        Se connecter
      </button>
    </div>
  </form>

  <!-- Lien vers l'inscription -->
  <div class="text-center mt-6">
    <p class="text-gray-600">Pas encore de compte ? 
      <a href="register" class="text-primary hover:underline font-medium">
        S'inscrire comme exposant
      </a>
    </p>
  </div>
</div>
@endsection