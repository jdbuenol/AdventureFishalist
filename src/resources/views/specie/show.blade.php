@extends('layouts.CustomerApp')
@section('title', "SPECIE SHOW")
@section('content')
<p>THIS IS THE SHOW SPECIE VIEW</p>
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="https://laravel.com/img/logotype.min.svg" class="img-fluid rounded-start">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <p class="card-title">ID: {{ $viewData["specie"]->getId() }}</p>
        <p class="card-text">Specie: {{ $viewData["specie"]->getName() }}</p>
      </div>
    </div>
  </div>
</div>
@endsection