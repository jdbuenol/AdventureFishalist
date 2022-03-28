<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "HOME")
@section('content')
<div class="PostsHeader Bordered">
    <p class="display-2">WELCOME TO ADVENTURE FISHALIST: POPULAR PRODUCTS</p>
    <div class="PopularGrid">
        <div class="mx-5">
        @if(isset($viewData['popularPets']))
        <p class="display-6">POPULAR PETS</p>
        @foreach ($viewData['popularPets'] as $petfish)
        <div class="card">
            <img src= {{ $petfish->getImage() }} class="card-img-top img-card FishImage">
            <div class="card-body text-center">
              <p class="card-text"><b>Specie:</b> {{ $petfish->getSpecie()->getName() }}</p>
              <p class="card-text"><b>Size:</b> {{ $petfish->getSize() }}</p>
              <p class="card-text"><b>Inventory:</b> {{ $petfish->getInventory() }}</p>
              <a href="{{ route('shop.petshopshow', $petfish->getId()) }}"
                class="btn bg-primary text-white">&dollar;{{ $petfish->getPrice() }} Per Unit</a>
            </div>
        </div>
        @endforeach
        @endif
        </div>
        <div class="mx-5">
        @if(isset($viewData['popularFood']))
        <p class="display-6">POPULAR FOOD</p>
        @foreach ($viewData['popularFood'] as $foodfish)
        <div class="card">
            <img src= {{ $foodfish->getImage() }} class="card-img-top img-card FishImage">
            <div class="card-body text-center">
              <p class="card-title"><b>Specie:</b> {{ $foodfish->getSpecie()->getName() }}</p>
              <p class="card-title"><b>Cut:</b> {{ $foodfish->getCut() }}</p>
              <p class="card-title"><b>Inventory:</b> {{ $foodfish->getInventoryKG() }}KG</p>
              <a href="{{ route('shop.foodshopshow', $foodfish->getId()) }}"
                class="btn bg-primary text-white">&dollar;{{ $foodfish->getPricePerKG() }} PER KG</a>
            </div>
          </div>
        @endforeach
        @endif
        </div>
    </div>
</div>
@endsection