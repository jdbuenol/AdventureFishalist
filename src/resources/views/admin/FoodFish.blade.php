<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "FOOD FISH")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center"><img src="{{ asset($viewData['fish']->getImage()) }}"></h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData['fish']->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>PRICE: </b>{{ $viewData['fish']->getPricePerKG() }}
    </div>
    <div class="align-self-center center-text">
    <b>INVENTORY: </b>{{ $viewData['fish']->getInventoryKG() }}
    </div>
    <div class="align-self-center center-text">
    <b>CUT: </b>{{ $viewData['fish']->getCut() }}
    </div>
    <div class="align-self-center center-text">
    <b>QUANTITY BOUGHT: </b>{{ $viewData['fish']->getQuantityBought() }}
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
    <form action="{{ route('admin.updateFoodFish', $viewData['fish']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="pricePerKG" class="label">Price (PerKG)</label>
            <input type="number" step="0.01" name="pricePerKG" id="pricePerKG" placeholder="69.00" value="{{ old('pricePerKG') }}" class="form-control">
        </div>
        @error('pricePerKG')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="inventoryKG" class="label">INVENTORY (KG)</label>
            <input type="number" step="1" name="inventoryKG" id="inventoryKG" placeholder="42" value="{{ old('inventoryKG') }}" class="form-control">
        </div>
        @error('inventory')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-goup">
            <label for="cut" class="label">CUT</label>
            <select class="form-control" name="cut" id="cut">
                <option class="form-control" value=""></option>
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
    <form action="{{ route('admin.deleteFoodFish', $viewData['fish']->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection