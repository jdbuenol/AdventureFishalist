<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "PET SHOW")
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src= {{ $viewData["petfish"]->getImage() }} class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-title"><b>ID:</b> {{ $viewData["petfish"]->getId() }}</p>
        <p class="card-text"><b>Size:</b> {{ $viewData["petfish"]->getSize() }}</p>
        <p class="card-text"><b>Price:</b> {{ $viewData["petfish"]->getPrice() }}</p>
        <p class="card-text"><b>Inventory:</b> {{ $viewData["petfish"]->getInventory() }}</p>
        <p class="card-text"><b>Quantity Bought:</b> {{ $viewData["petfish"]->getQuantityBought() }}</p>
        <p class="card-text"><b>Specie:</b><a href="{{ route('specie.show', $viewData["petfish"]->getSpecieId()) }}"> {{ $viewData["petfish"]->getSpecie()->getName() }} </a>
      </div>
    </div>
    <div class="col-md-8">
      @if($viewData["cartButton"])
      <form action="{{ route('order.addPet', $viewData["petfish"]->getId()) }}" method="POST" class="form-group">
        @csrf
        <button class="CartButton" type="submit"><i class="fa-solid fa-cart-plus display-1 my-2 mx-2"></i></button>
        <input class="form-control" type="number" step="1" id="quantity" name="quantity" placeholder="quantity">
      </form>
      @else
      <i class="fa-solid fa-cart-plus display-1 my-2 mx-2 red-text"></i>
      <p class="display-3 my-2 mx-2 red-text">THIS ITEM IS ALREADY IN THE CART</p>
      @endif
    </div>
  </div>
</div>
@endsection