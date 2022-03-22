@extends('layouts.CustomerApp')
@section('title', "PET SHOW")
@section('content')
<p>THIS IS THE SHOW PET VIEW</p>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src= {{ $viewData["petfish"]->getImage() }} class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-title">ID: {{ $viewData["petfish"]->getId() }}</p>
        <p class="card-text">Image: {{ $viewData["petfish"]->getImage() }}</p>
        <p class="card-text">Size: {{ $viewData["petfish"]->getSize() }}</p>
        <p class="card-text">Price: {{ $viewData["petfish"]->getPrice() }}</p>
        <p class="card-text">Inventory: {{ $viewData["petfish"]->getInventory() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection