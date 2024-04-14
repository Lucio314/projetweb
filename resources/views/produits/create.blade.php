@extends('layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="ref" class="form-label">REF</label>
                    <input type="text" class="form-control" id="ref" name="ref" required>
                    @error('ref')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="design" class="form-label">Design</label>
                    <textarea class="form-control" id="design" name="design" rows="3" required></textarea>
                    @error('design')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="pu" class="form-label">PU</label>
                    <input type="number" class="form-control" id="pu" name="pu" required>
                    @error('pu')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="code" class="form-label">Catégorie</label>
                    <select name="code" id="code" class="form-select">
                        @foreach ($categories as $categorie)
                        <option value="{{$categorie->code}}">{{$categorie->libelle}}</option>
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

                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </form>
        </div>
    </div>
</div>
@endsection
