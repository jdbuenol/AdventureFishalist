<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "PET-SHOP")
@section('content')
<div class="row">
  @foreach ($viewData["petfishs"] as $petfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src= {{ $petfish->getImage() }} class="card-img-top img-card">
      <div class="card-body text-center">
        <p class="card-text"><b>Specie:</b> {{ $petfish->getSpecie()->getName() }}</p>
        <p class="card-text"><b>Size:</b> {{ $petfish->getSize() }}</p>
        <p class="card-text"><b>Inventory:</b> {{ $petfish->getInventory() }}</p>
        <a href="{{ route('shop.petshopshow', $petfish->getId()) }}"
          class="btn bg-primary text-white">&dollar;{{ $petfish->getPrice() }} Per Unit</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection