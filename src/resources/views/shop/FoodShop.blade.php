<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "FOOD-SHOP")
@section('content')
<p>THIS IS A FOOD SHOP</p>
<div class="row">
  @foreach ($viewData["foodfishs"] as $foodfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src= {{ $foodfish->getImage() }} class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('shop.foodshopshow', $foodfish->getId()) }}"
          class="btn bg-primary text-white">Id: {{ $foodfish->getId() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection