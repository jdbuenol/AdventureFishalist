<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW PET FISH")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW PET FISH
    </h1>
    <form action="{{ route('admin.createPetFish') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="price" class="label">Price</label>
            <input type="number" step="0.01" name="price" id="price" placeholder="69.00" value="{{ old('price') }}" class="form-control">
        </div>
        @error('price')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="inventory" class="label">INVENTORY</label>
            <input type="number" step="1" name="inventory" id="inventory" placeholder="42" value="{{ old('inventory') }}" class="form-control">
        </div>
        @error('inventory')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-goup">
            <label for="size" class="label">SIZE</label>
            <select class="form-control" name="size" id="size">
                <option class="form-control" value="SMALL">SMALL</option>
                <option class="form-control" value="MEDIUM">MEDIUM</option>
                <option class="form-control" value="BIG">BIG</option>
            </select>
        </div>
        @error('size')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="specie_id" class="label">SPECIE ID</label>
            <input type="text" name="specie_id" id="specie_id" placeholder="specie_id" value="{{ old('specie_id') }}" class="form-control">
        </div>
        @if($viewData)
            <p class="red-text">{{ $viewData }}</p>
        @endif
        @error('specie_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection