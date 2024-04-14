@extends('layout')
@section('content')
@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<a href="{{route('produits.create')}}" class="btn btn-primary"> ADD PRODUIT</a>
<a href="{{route('produits.recherche')}}" class="btn btn-primary">Commander</a>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
        <tr>
            <th>REF</th>
            <th>DESIGN</th>
            <th>PU</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($produits as $produit)
        <tr>
            <td scope="row">{{$produit->ref}}</td>
            <td class="align-middle">{{$produit->design}}</td>
            <td class="align-middle">{{ $produit->pu}}</br>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('produits.edit', $produit->ref)}}" type="button" class="btn btn-warning">Edit</a>
                    <form action="{{ route('produits.destroy', $produit->ref) }}" method="POST" type="button"
                        class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger m-0">Delete</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @if (empty($produits))
        <tr>
            <td class="text-center" colspan="5">Product not found</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection