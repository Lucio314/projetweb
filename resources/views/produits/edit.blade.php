@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('produits.update',$produit->ref) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="ref" class="form-label">REF</label>
                    <input type="text" class="form-control" id="ref" name="ref" value="{{$produit->ref}}" readonly>
                    @error('ref')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="design" class="form-label">Design</label>
                    <textarea class="form-control" id="design" name="design" rows="3"
                        required>{{$produit->design}}</textarea>

                    @error('design')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="pu" class="form-label">PU</label>
                    <input type="number" class="form-control" id="pu" name="pu" value="{{$produit->pu}}" required>
                    @error('pu')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Catégorie</label>
                    <select name="code" id="code" class="form-select">
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->code}}" {{($categorie->code==$produit->code)?"selected":""}}
                            >{{$categorie->libelle}}</option>
                        @endforeach
                    </select>

                    @error('code')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="mb-3">
                    <label for="imageprod" class="form-label">Image du produit</label>
                    <input type="file" class="form-control" id="imageprod" name="imageprod" accept="imageprod/*"
                        required>
                    @error('imageprod')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Modifier</button>
            </form>
        </div>
    </div>
</div>
@endsection