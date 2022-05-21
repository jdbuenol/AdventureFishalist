<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "FISH ITEM")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">FISH ITEM</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData['order']->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>ORDER: </b><a href="{{ route('admin.order', $viewData['order']->getOrderId()) }}">{{ $viewData['order']->getOrderId() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>TYPE: </b>{{ $viewData['order']->getType() }}
    </div>

    @if($viewData['order']->getType() == 'PET')
    <div class="align-self-center center-text">
    <b>FISH: </b><a href="{{ route('admin.petFish', $viewData['order']->getPetFishesId()) }}">{{ $viewData['order']->getPetFishesId() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>QUANTITY: </b>{{ $viewData['order']->getQuantityFish() }}
    </div>
    @else
    <div class="align-self-center center-text">
    <b>FISH: </b><a href="{{ route('admin.foodFish', $viewData['order']->getFoodFishesId()) }}">{{ $viewData['order']->getFoodFishesId() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>QUANTITY(KG): </b>{{ $viewData['order']->getQuantityKG() }}
    </div>
    @endif

    <div class="align-self-center center-text">
    <b>TOTAL PRICE: </b>{{ $viewData['order']->getTotalPrice() }}
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['order']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['order']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateFishOrder', $viewData['order']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="order_id" class="label">ORDER ID</label>
            <input type="text" name="order_id" id="order_id" value="{{ old('order_id') }}" class="form-control">
        </div>
        @error('order_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if($viewData['order']->getType() == 'PET')
        <div class="form-group">
            <label for="petFish_id" class="label">PET FISH ID</label>
            <input type="text" name="petFish_id" id="petFish_id" value="{{ old('petFish_id') }}" class="form-control">
        </div>
        @error('petFish_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="quantityFish" class="label">QUANTITY</label>
            <input type="number" step="1" name="quantityFish" id="quantityFish" value="{{ old('quantityFish') }}" class="form-control">
        </div>
        @error('quantityFish')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @else
        <div class="form-group">
            <label for="foodFish_id" class="label">FOOD FISH ID</label>
            <input type="text" name="foodFish_id" id="foodFish_id" value="{{ old('foodFish_id') }}" class="form-control">
        </div>
        @error('foodFish_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="quantityKG" class="label">QUANTITY (KG)</label>
            <input type="number" step="0.01" name="quantityKG" id="quantityKG" value="{{ old('quantityKG') }}" class="form-control">
        </div>
        @error('quantityKG')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @endif
        @if($viewData['error'])
            <p class="red-text">{{ $viewData['error'] }}</p>
        @endif
        <button type="submit" class="btn btn-primary my-5">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteFishOrder', $viewData['order']->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection