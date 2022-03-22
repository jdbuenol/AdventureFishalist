<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "SPECIES")
@section('content')
<p>THIS IS THE INDEX SPECIE VIEW</p>
<div class="row">
  @foreach ($viewData["species"] as $specie)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src="https://laravel.com/img/logotype.min.svg" class="card-img-top img-card">
      <div class="card-body text-center">
        <p class="card-text">Id: {{ $specie->getId() }}</p>
        <a href="{{ route('specie.show', $specie->getId()) }}"
          class="btn bg-primary text-white">Specie: {{ $specie->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection