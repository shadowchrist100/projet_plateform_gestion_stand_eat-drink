@extends('layouts.exp_head')

@section('contentE')
<div class="exposant-show py-5">
    <div class="container">
        <!-- En-tête de l'exposant -->
        <div class="exposant-header text-center mb-5">
            <h1 class="display-4">{{ $exposant->nom_entreprise }}</h1>
            <h2 class="h3">{{ $exposant->nom_complet }}</h2>
            
            <div class="badge bg-warning text-dark fs-5 my-3">
                {{ $exposant->type_activite }}
            </div>
            
            <p class="lead">{{ $exposant->description_activite }}</p>
            
            <div class="contact-info mt-4">
                <p class="mb-1"><i class="bi bi-geo-alt-fill"></i> {{ $exposant->adresse ?? 'Adresse non renseignée' }}</p>
                <p><i class="bi bi-telephone-fill"></i> {{ $exposant->telephone ?? 'Téléphone non renseigné' }}</p>
            </div>
        </div>

        <hr class="my-5">

        <!-- Section Produits -->
        <section class="products-section">
            <h3 class="text-center mb-4">Nos Produits</h3>
            
            @if($exposant->produits->count() > 0)
                <div class="row g-4">
                    @foreach($exposant->produits as $produit)
                        <div class="col-md-6 col-lg-4">
                            <div class="card product-card h-100">
                                @if($produit->image_url)
                                    <img src="{{ asset('storage/' . $produit->image_url) }}" 
                                         class="card-img-top product-image" 
                                         alt="{{ $produit->nom }}">
                                @else
                                    <div class="product-image-placeholder">
                                        <i class="bi bi-image"></i>
                                    </div>
                                @endif
                                
                                <div class="card-body">
                                    <h4 class="card-title">{{ $produit->nom }}</h4>
                                    <p class="card-text text-muted">{{ $produit->description }}</p>
                                </div>
                                
                                <div class="card-footer bg-white">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="price">{{ number_format($produit->prix, 2) }} €</span>
                                        <button class="btn btn-primary add-to-cart" 
                                                data-product-id="{{ $produit->id }}">
                                            Ajouter au panier
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="alert alert-info text-center">
                    Cet exposant n'a pas encore de produits enregistrés.
                </div>
            @endif
        </section>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            
            // Ici, vous pouvez ajouter la logique AJAX pour ajouter au panier
            fetch('/panier/ajouter', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ product_id: productId })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Produit ajouté au panier !');
                }
            });
        });
    });
</script>
@endsection