<!-- AUTHOR: JUAN JOSE MADRIGAL -->
@extends('layouts.CustomerApp')
@section('title', __('messages.pet_shop'))
@section('content')
<div class="d-flex flex-column align-content-center text-center my-2">
<a href="{{ route('shop.petRandom') }}"><button class="btn btn-primary">{{__('messages.rand_btt')}}</button></a>
</div>
<div class="row">
  @foreach ($viewData["petfishs"] as $petfish)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <img src= {{ asset($petfish->getImage()) }} class="card-img-top img-card FishImage">
      <div class="card-body text-center">
        <p class="card-text"><b>{{__('messages.specie')}}:</b> {{ $petfish->getSpecie()->getName() }}</p>
        <p class="card-text"><b>{{__('messages.size')}}:</b> {{ $petfish->getSize() }}</p>
        <p class="card-text"><b>{{__('messages.inventory')}}:</b> {{ $petfish->getInventory() }}</p>
        <a href="{{ route('shop.petshopshow', $petfish->getId()) }}"
          class="btn bg-primary text-white">&dollar;{{ $petfish->getPrice() }} {{__('messages.per_un')}}</a>
      </div>
    </div>
  </div>
  @endforeach
  <ul class="pagination justify-content-center">
    @if($viewData["petfishs"]->currentPage() > 1)
    <li class="page-item"><a class="page-link" href="{{ route("shop.petShop", ['page' => $viewData["petfishs"]->currentPage() - 1])}}">{{__('messages.prev')}}</a></li>
    @endif
    <li class="page-item disabled"><b class="page-link">{{ $viewData["petfishs"]->currentPage() }}</b></li>
    @if($viewData["petfishs"]->currentPage() < $viewData["petfishs"]->lastPage())
    <li class="page-item"><a class="page-link" href="{{ route("shop.petShop", ['page' => $viewData["petfishs"]->currentPage() + 1]) }}">{{__('messages.next')}}</a></li>
    @endif
  </ul>
</div>
@endsection