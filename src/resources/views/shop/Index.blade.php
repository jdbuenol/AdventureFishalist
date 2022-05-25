<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_home'))
@section('content')
<div class="PostsHeader Bordered">
    <p class="display-2">{{__('messages.welcome')}}</p>
    <div class="PopularGrid">
        <div class="mx-5">
        @if(isset($viewData['popularPets']))
        <p class="display-6">{{__('messages.poppets')}}</p>
        @foreach ($viewData['popularPets'] as $petfish)
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
        @endforeach
        @endif
        </div>
        <div class="mx-5">
        @if(isset($viewData['popularFood']))
        <p class="display-6">{{__('messages.popfood')}}</p>
        @foreach ($viewData['popularFood'] as $foodfish)
        <div class="card">
            <img src= {{ asset($foodfish->getImage()) }} class="card-img-top img-card FishImage">
            <div class="card-body text-center">
              <p class="card-title"><b>{{__('messages.specie')}}:</b> {{ $foodfish->getSpecie()->getName() }}</p>
              <p class="card-title"><b>{{__('messages.cut')}}:</b> {{ $foodfish->getCut() }}</p>
              <p class="card-title"><b>{{__('messages.inventory')}}:</b> {{ $foodfish->getInventoryKG() }}KG</p>
              <a href="{{ route('shop.foodshopshow', $foodfish->getId()) }}"
                class="btn bg-primary text-white">&dollar;{{ $foodfish->getPricePerKG() }} {{__('messages.per_kg')}}</a>
            </div>
          </div>
        @endforeach
        @endif
        </div>
    </div>
</div>
@endsection