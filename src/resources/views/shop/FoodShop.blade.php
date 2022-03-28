<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', "FOOD-SHOP")
@section('content')
<div class="d-flex flex-column align-content-center text-center my-2">
<a href="{{ route('shop.foodRandom') }}"><button class="btn btn-primary">DON'T KNOW WHAT TO ORDER? TRY RANDOM</button></a>
</div>
<div class="row">
  @foreach ($viewData["foodfishs"] as $foodfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src= {{ $foodfish->getImage() }} class="card-img-top img-card">
      <div class="card-body text-center">
        <p class="card-title"><b>Specie:</b> {{ $foodfish->getSpecie()->getName() }}</p>
        <p class="card-title"><b>Cut:</b> {{ $foodfish->getCut() }}</p>
        <p class="card-title"><b>Inventory:</b> {{ $foodfish->getInventoryKG() }}KG</p>
        <a href="{{ route('shop.foodshopshow', $foodfish->getId()) }}"
          class="btn bg-primary text-white">&dollar;{{ $foodfish->getPricePerKG() }} PER KG</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="align-self-center center-text PostsHeader">
    @if($viewData["foodfishs"]->currentPage() > 1)
    <a href="{{ route("shop.foodShop", ['page' => $viewData["foodfishs"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    <b>{{ $viewData["foodfishs"]->currentPage() }}</b>
    @if($viewData["foodfishs"]->currentPage() < $viewData["foodfishs"]->lastPage())
    <a href="{{ route("shop.foodShop", ['page' => $viewData["foodfishs"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
</div>
@endsection