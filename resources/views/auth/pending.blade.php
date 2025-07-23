@extends('layouts.headPending')

@section('contentP')
<div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow" style="margin-top: 4cm; box-shadow: 0 8px 24px rgba(0,0,0,0.18), 0 1.5px 6px rgba(0,0,0,0.12);">
    <div class="text-center">
        <svg class="mx-auto h-12 w-12 text-yellow-500" ...></svg>
        <h2 class="mt-3 text-lg font-medium">Votre compte est en attente d'approbation</h2>
        <p class="mt-2 text-sm text-gray-500">
            Notre équipe examine votre inscription. Vous recevrez un email dès que votre compte sera activé.
        </p>
        <div class="mt-4 bg-yellow-50 p-4 rounded-md">
            <p class="text-sm text-yellow-700">
                Statut actuel : <strong>En attente de validation</strong>
            </p>
        </div>
    </div>
</div>
@endsection