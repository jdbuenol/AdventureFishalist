<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "FOOD SHOW")
@section('content')
<div class="d-flex flex-column justify-content-center">
  <div class="d-flex justify-content-center btns-gap PostsHeader FishInfo">
    <div>
      <img src= {{ asset($viewData["foodfish"]->getImage()) }} class="FishImage">
    </div>
    <div class="align-self-center">
      <p><b>ID:</b> {{ $viewData["foodfish"]->getId() }}</p>
      <p><b>Cut:</b> {{ $viewData["foodfish"]->getCut() }}</p>
      <p><b>PricePerKG:</b> {{ $viewData["foodfish"]->getPricePerKG() }}</p>
      <p><b>InventoryKG:</b> {{ $viewData["foodfish"]->getInventoryKG() }}</p>
      <p><b>Quantity Bought:</b> {{ $viewData["foodfish"]->getQuantityBought() }}</p>
      <p><b>Specie:</b><a href="{{ route('specie.show', $viewData["foodfish"]->getSpecieId()) }}"> {{ $viewData["foodfish"]->getSpecie()->getName() }} </a>
    </div>
  </div>
  <div class="d-flex justify-content-center">
    @if($viewData["cartButton"])
    <form action="{{ route('order.addFood', $viewData["foodfish"]->getId()) }}" method="POST" class="d-flex CartForm my-3">
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