<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "PET SHOW")
@section('content')
<div class="d-flex flex-column justify-content-center">
  <div class="d-flex justify-content-center btns-gap PostsHeader FishInfo">
    <div>
      <img src= {{ asset($viewData["petfish"]->getImage()) }} class="FishImage">
    </div>
    <div class="align-self-center">
      <p><b>ID:</b> {{ $viewData["petfish"]->getId() }}</p>
      <p><b>Size:</b> {{ $viewData["petfish"]->getSize() }}</p>
      <p><b>Price:</b> {{ $viewData["petfish"]->getPrice() }}</p>
      <p><b>Inventory:</b> {{ $viewData["petfish"]->getInventory() }}</p>
      <p><b>Quantity Bought:</b> {{ $viewData["petfish"]->getQuantityBought() }}</p>
      <p><b>Specie:</b><a href="{{ route('specie.show', $viewData["petfish"]->getSpecieId()) }}"> {{ $viewData["petfish"]->getSpecie()->getName() }} </a>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    @if($viewData["cartButton"])
    <form action="{{ route('order.addPet', $viewData["petfish"]->getId()) }}" method="POST" class="d-flex CartForm my-3">
      @csrf
      <button class="CartButton" type="submit"><i class="fa-solid fa-cart-plus display-5 my-2 mx-2"></i></button>
      <input class="form-control" type="number" step="1" id="quantity" name="quantity" placeholder="quantity">
    </form>
    @else
    <div class="d-flex CartForm my-3">
      <i class="fa-solid fa-cart-plus display-5 my-2 mx-2 red-text"></i>
      <p class="display-3 my-2 mx-2 red-text">THIS ITEM IS ALREADY IN THE CART</p>
    </div>
    @endif
  </div>
</div>
@endsection