@extends('layouts.auth')

@section('title', 'Connexion')

@section('content')
<div class="min-h-screen flex items-center justify-center" style="background: linear-gradient(135deg, #fff6ee 0%, #fff6f2 100%);">
  <div class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg border border-gray-200">

    <div class="flex flex-col items-center mb-2 mt-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#f97316" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mb-2">
        <path d="m2 7 4.41-4.41A2 2 0 0 1 7.83 2h8.34a2 2 0 0 1 1.42.59L22 7"/>
        <path d="M4 12v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8"/>
        <path d="M15 22v-4a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v4"/>
        <path d="M2 7h20"/>
        <path d="M22 7v3a2 2 0 0 1-2 2a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 16 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 12 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 8 12a2.7 2.7 0 0 1-1.59-.63.7.7 0 0 0-.82 0A2.7 2.7 0 0 1 4 12a2 2 0 0 1-2-2V7"/>
      </svg>
    </div>

    <h1 class="text-2xl font-bold text-center text-gray-900 mb-1">Connexion</h1>
    <p class="text-center mb-6 text-gray-900">Connectez-vous à votre compte Eat&Drink</p>

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
      @csrf

      <!-- Email -->
      <div>
        <label class="block font-semibold mb-1 text-black" for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="votre@email.com"
               class="input input-bordered w-full text-black  bg-white border border-gray-300 @error('email') input-error @enderror">
        @error('email')
          <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <!-- Password -->
      <div>
        <label class="block font-semibold mb-1 text-gray-900" for="password">Mot de passe</label>
        <div class="relative">
          <input type="password" name="password" id="password" placeholder="Votre mot de passe"
                 class="input input-bordered w-full pr-10 text-black bg-white border border-gray-300 @error('password') input-error @enderror">
          <span class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
          </span>
        </div>
        @error('password')
          <span class="text-xs text-red-500">{{ $message }}</span>
        @enderror
      </div>
      <!-- Submit -->
      <div class="pt-2">
        <button type="submit" class="w-full py-3 rounded-lg bg-gray-900 text-white font-semibold text-base hover:bg-gray-800 transition">
          Se connecter
        </button>
      </div>
    </form>

    <!-- Inscription -->
    <div class="text-center mt-4 text-sm">
      <p class="text-gray-600">
        Pas encore de compte ?
        <a href="{{ route('register') }}" class="text-orange-500 font-semibold hover:underline">
          S'inscrire comme exposant
        </a>
      </p>
    </div>


  </div>
</div>
@endsection
