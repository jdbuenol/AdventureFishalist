<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "FOOD SHOW")
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src= {{ $viewData["foodfish"]->getImage() }} class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-title"><b>ID:</b> {{ $viewData["foodfish"]->getId() }}</p>
        <p class="card-text"><b>Cut:</b> {{ $viewData["foodfish"]->getCut() }}</p>
        <p class="card-text"><b>PricePerKG:</b> {{ $viewData["foodfish"]->getPricePerKG() }}</p>
        <p class="card-text"><b>InventoryKG:</b> {{ $viewData["foodfish"]->getInventoryKG() }}</p>
        <p class="card-text"><b>Quantity Bought:</b> {{ $viewData["foodfish"]->getQuantityBought() }}</p>
        <p class="card-text"><b>Specie:</b><a href="{{ route('specie.show', $viewData["foodfish"]->getSpecieId()) }}"> {{ $viewData["foodfish"]->getSpecie()->getName() }} </a>
      </div>
    </div>
    <div class="col-md-8">
      @if($viewData["cartButton"])
      <form action="{{ route('order.addFood', $viewData["foodfish"]->getId()) }}" method="POST" class="form-group">
        @csrf
        <button class="CartButton" type="submit"><i class="fa-solid fa-cart-plus display-1 my-2 mx-2"></i></button>
        <input class="form-control" type="number" step="0.01" id="quantity" name="quantity" placeholder="quantity">
      </form>
      @else
      <i class="fa-solid fa-cart-plus display-1 my-2 mx-2 red-text"></i>
      <p class="display-3 my-2 mx-2 red-text">THIS ITEM IS ALREADY IN THE CART</p>
      @endif
    </div>
  </div>
</div>
@endsection