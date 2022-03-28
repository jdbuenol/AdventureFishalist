<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "CART")
@section('content')
<div class="PostsHeader Bordered">
<p class="display-1">CART</p>
@if(count($viewData))
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
        </a>: {{ $cartItem["quantity"] }} <b>&dollar;{{$cartItem["price"]}}</b> (PET)
    @else
        <a href="{{ route("shop.foodshopshow", $cartItem["fish"]->getId()) }}" class="CartLink">
            <b>{{ $cartItem["fish"]->getSpecie()->getName() }}</b>
            <b>{{ $cartItem["fish"]->getCut() }}</b> 
        </a>: {{ $cartItem["quantity"] }} <b>&dollar;{{$cartItem["price"]}}</b> (FOOD)
    @endif
    </p>
@endforeach
<p class="display-6">TOTAL PRICE: &dollar;{{$viewData['price']}}</p>
<form action="{{ route('order.checkout') }}" method="POST">
    @csrf
<button class="btn btn-primary">CHECKOUT</button>
</form>
@else
    <p>WOW, YOUR CART IS EMPTY! BUY MORE CAPITALISM!</p>
@endif
</div>
@endsection