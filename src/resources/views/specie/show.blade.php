@extends('layouts.CustomerApp')
@section('title', "SPECIE SHOW")
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body PostsHeader">
        <p class="card-title"><b>ID:</b> {{ $viewData["specie"]->getId() }}</p>
        <p class="card-text"><b>Specie:</b> {{ $viewData["specie"]->getName() }}</p>
      </div>
    </div>
  </div>
</div>
<div class="PostsHeader">
@if($viewData["specie"]->getSpecieLocations()->count())
<p class="display-1">LOCATIONS</p>
@foreach ($viewData["specie"]->getSpecieLocations() as $SpecieLocation)
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-12">
      <img class="card-img-top" src="{{ asset('/images/map.png') }}">
      <div class="card-body">
        <p class="card-title"><b>LOCATION:</b> {{ $SpecieLocation->getLocation()->getName() }}</p>
        <p class="card-title"><b>GEO POSITION:</b> [{{ $SpecieLocation->getLocation()->getGeoLatitude() }}, {{ $SpecieLocation->getLocation()->getGeoLongitude() }}]</p>
        <p class="card-title"><b>COUNTRY:</b> {{ $SpecieLocation->getLocation()->getCountry() }}</p>
        <p class="card-text"><b>POBLATIONAL DENSITY:</b> {{ $SpecieLocation->getPoblationalDensity() }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<p class="display-3">CURRENTLY NO LOCATIONS OF THIS SPECIE ARE KNOWN</p>
@endif
</div>

@endsection