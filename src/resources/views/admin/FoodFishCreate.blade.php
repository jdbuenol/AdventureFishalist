<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW FOOD FISH")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW FOOD FISH
    </h1>
    <form action="{{ route('admin.createFoodFish') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="pricePerKG" class="label">Price (PerKG)</label>
            <input type="number" step="0.01" name="pricePerKG" id="pricePerKG" placeholder="69.00" value="{{ old('pricePerKG') }}" class="form-control">
        </div>
        @error('pricePerKG')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="inventoryKG" class="label">INVENTORY (KG)</label>
            <input type="number" step="0.01" name="inventoryKG" id="inventoryKG" placeholder="42.01" value="{{ old('inventoryKG') }}" class="form-control">
        </div>
        @error('inventoryKG')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-goup">
            <label for="cut" class="label">CUT</label>
            <select class="form-control" name="cut" id="cut">
                <option class="form-control" value="BACK MEAT">BACK MEAT</option>
                <option class="form-control" value="TAIL MEAT">TAIL MEAT</option>
                <option class="form-control" value="ABDOMEN MEAT">ABDOMEN MEAT</option>
            </select>
        </div>
        @error('cut')
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