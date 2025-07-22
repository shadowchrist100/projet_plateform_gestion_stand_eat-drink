@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

    <div class="text-center mb-8">
      <h1 class="text-3xl font-bold text-primary mb-2">Connexion</h1>
      <p class="text-gray-500">Connectez-vous à votre compte Eat&Drink</p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <!-- Email -->
      <div class="form-control">
        <label class="label">
          <span class="label-text">Adresse e-mail</span>
        </label>
        <input type="email" name="email" value="{{ old('email') }}" 
               class="input input-bordered w-full @error('email') input-error @enderror">
        @error('email')
          <label class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
          </label>
        @enderror
      </div>
      <!-- Password -->
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
      <!-- Submit -->
      <div class="pt-2">
        <button type="submit" class="btn btn-primary w-full">
          Se connecter
        </button>
      </div>
    </form>

    <!-- Inscription -->
    <div class="text-center mt-6 text-sm">
      <p class="text-gray-600">Pas encore de compte ? 
        <a href="{{ route('register') }}" class="text-secondary font-semibold hover:underline">
          S'inscrire comme exposant
        </a>
      </p>
    </div>

  </div>
</div>
@endsection
