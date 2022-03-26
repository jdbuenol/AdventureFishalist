<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW FISH ITEM")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW FISH ITEM
    </h1>
    <form action="{{ route('admin.createFishOrder') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="order_id" class="label">ORDER ID</label>
            <input type="text" name="order_id" id="order_id" value="{{ old('order_id') }}" class="form-control">
        </div>
        @error('order_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-goup">
            <label for="type" class="label">TYPE</label>
            <select class="form-control" name="type" id="type" onchange="checkType(this);">
                <option class="form-control" value="PET">PET</option>
                <option class="form-control" value="FOOD">FOOD</option>
            </select>
        </div>
        @error('type')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group TYPE-PET">
            <label for="petFish_id" class="label">PET FISH ID</label>
            <input type="text" name="petFish_id" id="petFish_id" value="{{ old('petFish_id') }}" class="form-control">
        </div>
        @error('petFish_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group TYPE-PET">
            <label for="quantityFish" class="label">QUANTITY</label>
            <input type="number" step="1" name="quantityFish" id="quantityFish" value="{{ old('quantityFish') }}" class="form-control">
        </div>
        @error('quantityFish')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group TYPE-FOOD hidden">
            <label for="foodFish_id" class="label">FOOD FISH ID</label>
            <input type="text" name="foodFish_id" id="foodFish_id" value="{{ old('foodFish_id') }}" class="form-control">
        </div>
        @error('foodFish_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group TYPE-FOOD hidden">
            <label for="quantityKG" class="label">QUANTITY (KG)</label>
            <input type="number" step="0.01" name="quantityKG" id="quantityKG" value="{{ old('quantityKG') }}" class="form-control">
        </div>
        @error('quantityKG')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if($viewData)
            <p class="red-text">{{ $viewData }}</p>
        @endif
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection