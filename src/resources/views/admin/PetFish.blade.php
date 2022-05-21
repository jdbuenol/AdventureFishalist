<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "PET FISH")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center"><img src="{{ asset($viewData['fish']->getImage()) }}"></h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData['fish']->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>PRICE: </b>{{ $viewData['fish']->getPrice() }}
    </div>
    <div class="align-self-center center-text">
    <b>INVENTORY: </b>{{ $viewData['fish']->getInventory() }}
    </div>
    <div class="align-self-center center-text">
    <b>SIZE: </b>{{ $viewData['fish']->getSize() }}
    </div>
    <div class="align-self-center center-text">
    <b>SPECIE: </b><a href="{{ route('admin.specie', $viewData['fish']->getSpecieId()) }}">{{ $viewData['fish']->getSpecie()->getName() }}</a>
    </div>
    <div class="align-self-center center-text">
        <b>FISH ITEMS: </b>
        [
            @foreach ($viewData['fish']->getFishOrders() as $fishOrder)
            <a href="{{ route('admin.fishOrder', $fishOrder->getId()) }}">{{ $fishOrder->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['fish']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['fish']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updatePetFish', $viewData['fish']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="price" class="label">Price</label>
            <input type="number" step="0.01" name="price" id="price" placeholder="69.00" value="{{ $viewData['fish']->getPrice() }}" class="form-control">
        </div>
        @error('price')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="inventory" class="label">INVENTORY</label>
            <input type="number" step="1" name="inventory" id="inventory" placeholder="42" value="{{ $viewData['fish']->getInventory() }}" class="form-control">
        </div>
        @error('inventory')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-goup">
            <label for="size" class="label">SIZE</label>
            <select class="form-control" name="size" id="size">
                <option class="form-control" value=""></option>
                <option class="form-control" value="SMALL" {{ $viewData['fish']->getSize() == "SMALL" ? "selected" : ""}}>SMALL</option>
                <option class="form-control" value="MEDIUM" {{ $viewData['fish']->getSize() == "MEDIUM" ? "selected" : ""}}>MEDIUM</option>
                <option class="form-control" value="BIG" {{ $viewData['fish']->getSize() == "BIG" ? "selected" : ""}}>BIG</option>
            </select>
        </div>
        @error('size')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="specie_id" class="label">SPECIE ID</label>
            <input type="text" name="specie_id" id="specie_id" placeholder="specie_id" value="{{ $viewData['fish']->getSpecieId() }}" class="form-control">
        </div>
        @if($viewData['error'])
            <p class="red-text">{{ $viewData['error'] }}</p>
        @endif
        @error('specie_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deletePetFish', $viewData['fish']->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection