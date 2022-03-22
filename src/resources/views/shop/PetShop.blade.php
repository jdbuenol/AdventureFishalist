@extends('layouts.CustomerApp')
@section('title', "PET-SHOP")
@section('content')
<p>THIS IS A PET-SHOP</p>
<div class="row">
  @foreach ($viewData["petfishs"] as $petfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src= {{ $petfish->getImage() }} class="card-img-top img-card">
      <div class="card-body text-center">
        <a href="{{ route('shop.petshopshow', $petfish->getId()) }}"
          class="btn bg-primary text-white">Id: {{ $petfish->getId() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection