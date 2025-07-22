@extends('layouts.app')

@section('content')
<div class="exposants-page">
    <section class="hero-section py-5 bg-light">
        <div class="container">
            <h1 class="text-center mb-3">Nos Exposants</h1>
            <p class="text-center lead">Découvrez nos artisans et leurs produits d'exception</p>
            
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('exposants.index') }}" method="GET">
                        <input type="text" name="q" value="{{ $query ?? '' }}" placeholder="Rechercher...">
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="exposants-list py-5">
        <div class="container">
            <div class="row">
                @foreach($exposants as $index => $exposant)
                    <div class="col-md-4 mb-4">
                        <article class="card h-100">
                            <div class="card-header d-flex align-items-center">
                                <h2 class="h5 mb-0">{{ $exposant->nom_entreprise }}</h2>
                            </div>
                            
                            <div class="card-body">
                                <h3 class="h6">{{ $exposant->nom_complet }}</h3>
                                <p class="text-muted">{{ $exposant->type_activite }}</p>
                                
                                <div class="mb-3">
                                    <p>{{ Str::limit($exposant->description_activite, 100) }}</p>
                                    @if($exposant->telephone)
                                        <p class="text-primary">{{ $exposant->telephone }}</p>
                                    @endif
                                </div>
                                
                                @if($exposant->produits->count() > 0)
                                    <div class="products">
                                        <h4 class="h6">Produits disponibles :</h4>
                                        <ul class="list-unstyled">
                                            @foreach($exposant->produits->take(3) as $produit)
                                                <li><strong>{{ $produit->nom }}</strong></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="card-footer bg-transparent">
                                <a href="{{ route('exposants.show', $exposant->id) }}" class="btn btn-success w-100">Voir le stand</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
@endsection