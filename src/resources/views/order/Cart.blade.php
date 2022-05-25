<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_cart'))
@section('content')
<div class="PostsHeader Bordered">
<p class="display-1">{{__('messages.upcase_cart')}}</p>
@if(count($viewData['items']))
@foreach ($viewData['items'] as $cartItem)
    <p class="CartItem">
    <form class="TrashForm" action="{{ route('order.deleteItem', ["type" => $cartItem["type"], "fishId" => $cartItem["fish"]->getId()]) }}" method="POST">
        @csrf
        @method("DELETE")
        <button type="submit" class="TrashButton"><i class="fa-solid fa-trash-can red-text"></i></button>
    </form>
    @if($cartItem["type"] == "PET")
        <a href="{{ route("shop.petshopshow", $cartItem["fish"]->getId()) }}" class="CartLink">
            <b>{{ $cartItem["fish"]->getSpecie()->getName() }}</b> 
            <b>{{ $cartItem["fish"]->getSize() }}</b>
        </a>: {{ $cartItem["quantity"] }} <b>&dollar;{{$cartItem["price"]}}</b> {{__('messages.cart_pet')}}
    @else
        <a href="{{ route("shop.foodshopshow", $cartItem["fish"]->getId()) }}" class="CartLink">
            <b>{{ $cartItem["fish"]->getSpecie()->getName() }}</b>
            <b>{{ $cartItem["fish"]->getCut() }}</b> 
        </a>: {{ $cartItem["quantity"] }} <b>&dollar;{{$cartItem["price"]}}</b> {{__('messages.cart_food')}}
    @endif
    </p>
@endforeach
<p class="display-6">{{__('messages.upcase_tprice')}}: &dollar;{{$viewData['price']}}</p>
<form action="{{ route('order.checkout') }}" method="POST">
    @csrf
<button class="btn btn-primary">{{__('messages.cart_checkout')}}</button>
</form>
@else
    <p>{{__('messages.cart_empty')}}</p>
@endif
</div>
@endsection