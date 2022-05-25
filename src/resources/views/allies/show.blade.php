<!-- AUTHOR: JULIAN DAVID BUENO -->
@extends('layouts.CustomerApp')
@section('title', "Mobiles")
@section('content')
@if( $viewData )
<div class="row my-3">
@foreach($viewData['body'] as $mobile)
<div class="col-md-4 col-lg-3 mb-2">
<div class="card">
    <img src="{{ $mobile->imageUrl }}" class="card-img-top img-card FishImage">
    <div class="card-body text-center">
    <p class="card-text"><b>Name:</b> {{ $mobile->name }}</p>
    <p class="card-text"><b>Price:</b> {{ $mobile->price }}</p>
    <p class="card-text"><b>Brand:</b> {{ $mobile->brand }}</p>
    <p class="card-text"><b>Model:</b> {{ $mobile->model }}</p>
    <a href="{{ $mobile->linkToMobile }}"
        class="btn btn-dark">Know more</a>
    </div>
</div>
</div>
@endforeach
</div>
@endif
@endsection