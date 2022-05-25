@extends('layouts.CustomerApp')
@section('title', __('messages.specieshow'))
@section('content')
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-md-8">
      <div class="card-body PostsHeader">
        <p class="card-title"><b>{{__('messages.upcase_id')}}:</b> {{ $viewData["specie"]->getId() }}</p>
        <p class="card-text"><b>{{__('messages.specie')}}:</b> {{ $viewData["specie"]->getName() }}</p>
      </div>
    </div>
  </div>
</div>
<div class="PostsHeader">
@if($viewData["specie"]->getSpecieLocations()->count())
<p class="display-1">{{__('messages.upcase_locations')}}</p>
@foreach ($viewData["specie"]->getSpecieLocations() as $SpecieLocation)
<div class="card mb-3">
  <div class="row g-0">
    <div class="col-12">
      <img class="card-img-top" src="{{ "https://api.mapbox.com/styles/v1/mapbox/streets-v11/static/".$SpecieLocation->getLocation()->getGeoLongitude().",".$SpecieLocation->getLocation()->getGeoLatitude().",5/1280x1280?access_token=".env("MAPBOX_KEY") }}">
      <div class="card-body">
        <p class="card-title"><b>{{__('messages.location')}}:</b> {{ $SpecieLocation->getLocation()->getName() }}</p>
        <p class="card-title"><b>{{__('messages.geopos')}}:</b> [{{ $SpecieLocation->getLocation()->getGeoLatitude() }}, {{ $SpecieLocation->getLocation()->getGeoLongitude() }}]</p>
        <p class="card-title"><b>{{__('messages.country')}}:</b> {{ $SpecieLocation->getLocation()->getCountry() }}</p>
        <p class="card-text"><b>{{__('messages.pobldensi')}}&sup2;):</b> {{ $SpecieLocation->getPoblationalDensity() }}</p>
      </div>
    </div>
  </div>
</div>
@endforeach
@else
<p class="display-3">{{__('messages.nospecieloc')}}</p>
@endif
</div>

@endsection