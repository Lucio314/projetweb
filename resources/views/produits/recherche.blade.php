@extends('layout')

@section('content')
<!-- Formulaire de recherche -->
<div class="" style="display: flex;">
    <form action="{{ route('produits.recherche') }}" method="GET" style="margin-bottom: 20px;">
        <div class="form-group">
            <label for="categorie">Rechercher par catégorie :</label>
            <select name="categorie" id="categorie" class="form-control" required>
                <option value="">-- Choisissez une catégorie --</option>
                @foreach ($categories as $categorie)
                <option value="{{ $categorie->code }}">{{ $categorie->libelle }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary">Rechercher</button>
        </div>
    </form>
</div>

<!-- Affichage des produits -->
<div style="display:flex; flex-wrap:wrap; justify-content:space-around; gap:2%">
    @foreach ($produits as $produit)
    <div class="card mt-3" >
        <div class="card-body">
            <img class="card-img-top" width="100%" height="200px" src="{{ $produit->imageUrl() }}"
                alt="Image du produit">
            <h5 class="card-title">{{ $produit->design }}</h5>
            <p class="card-text">{{ $produit->pu }} FCFA</p>
        </div>
        <div style="display: flex; justify-content: space-around; margin-bottom: 10px;">
            <a href="{{ route('produits.show', $produit->ref) }}" class="btn btn-primary">Choisir</a>
        </div>
    </div>
    @endforeach
</div>
@endsection
