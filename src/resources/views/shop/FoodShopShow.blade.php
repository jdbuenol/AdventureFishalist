@extends('layouts.CustomerApp')
@section('title', "FOOD SHOW")
@section('content')
<p>THIS IS THE SHOW FOOD VIEW</p>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src= {{ $viewData["foodfish"]->getImage() }} class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-title">ID: {{ $viewData["foodfish"]->getId() }}</p>
        <p class="card-text">Image: {{ $viewData["foodfish"]->getImage() }}</p>
        <p class="card-text">Cut: {{ $viewData["foodfish"]->getCut() }}</p>
        <p class="card-text">PricePerKG: {{ $viewData["foodfish"]->getPricePerKG() }}</p>
        <p class="card-text">InventoryKG: {{ $viewData["foodfish"]->getInventoryKG() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection