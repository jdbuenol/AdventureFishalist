<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', __('messages.food_shop'))
@section('content')
<div class="d-flex flex-column align-content-center text-center my-2">
<a href="{{ route('shop.foodRandom') }}"><button class="btn btn-primary">{{__('messages.rand_btt')}}</button></a>
</div>
<div class="row">
  @foreach ($viewData["foodfishs"] as $foodfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src={{ asset($foodfish->getImage()) }} class="card-img-top img-card FishImage">
      <div class="card-body text-center">
        <p class="card-title"><b>{{__('messages.specie')}}:</b> {{ $foodfish->getSpecie()->getName() }}</p>
        <p class="card-title"><b>{{__('messages.cut')}}:</b> {{ $foodfish->getCut() }}</p>
        <p class="card-title"><b>{{__('messages.inventory')}}:</b> {{ $foodfish->getInventoryKG() }}KG</p>
        <a href="{{ route('shop.foodshopshow', $foodfish->getId()) }}"
          class="btn bg-primary text-white">&dollar;{{ $foodfish->getPricePerKG() }} {{__('messages.per_kg')}}</a>
      </div>
    </div>
  </div>
  @endforeach
  <ul class="pagination justify-content-center">
    @if($viewData["foodfishs"]->currentPage() > 1)
    <li class="page-item"><a class="page-link" href="{{ route("shop.foodShop", ['page' => $viewData["foodfishs"]->currentPage() - 1])}}">{{__('messages.prev')}}</a></li>
    @endif
    <li class="page-item disabled"><b class="page-link">{{ $viewData["foodfishs"]->currentPage() }}</b></li>
    @if($viewData["foodfishs"]->currentPage() < $viewData["foodfishs"]->lastPage())
    <li class="page-item"><a class="page-link" href="{{ route("shop.foodShop", ['page' => $viewData["foodfishs"]->currentPage() + 1]) }}">{{__('messages.next')}}</a></li>
    @endif
  </ul>
</div>
@endsection