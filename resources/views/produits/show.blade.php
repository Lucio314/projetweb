@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Passer une commande</h2>

    <div class="card mb-4">
        {{-- <div class="card-header">
            <h5>Produit</h5>
        </div> --}}
        <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                    <!-- Détails du produit -->
                    <p><strong>Référence :</strong> {{ $produit->ref }}</p>
                    <p><strong>Désignation :</strong> {{ $produit->design }}</p>
                    <p><strong>Prix Unitaire :</strong> {{ number_format($produit->pu, 2, ',', ' ') }} F CFA</p>
                </div>
                <div class="col-md-4">
                    <!-- Image du produit -->
                    <img src="{{ $produit->imageUrl() }}" alt="Image du produit" class="img-fluid"
                        style="max-width: 100%; height: auto;">
                </div>

            </div>
        </div>
    </div>

    <!-- Formulaire de commande -->
    <form action="{{ route('commandes.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="form-group col-md-8">
                <label for="qte">Entrer la quantité :</label>
                <input type="number" name="qte" id="qte" class="form-control" min="1" required>
            </div>
            <div class="form-group col-md-8">
                <label for="date">date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            <div class="form-group col-md-8">
                <label for="etat">etat</label>
                <input type="text" name="etat" id="etat" class="form-control" value="bon">
            </div>
            <div class="form-group col-md-8">
                <label for="numcli">numcli</label>
                <input type="text" name="numcli" id="numcli" class="form-control" value=1>
            </div>
            <div>
                <input style="" type="hidden" name="ref" value="{{ $produit->ref }}" class="form-control">
            </div>

            <div class="col-md-4">
                <button type="submit" class="btn btn-primary mt-3 col">✓ Commande</button>

            </div>
        </div>
    </form>
</div>
@endsection