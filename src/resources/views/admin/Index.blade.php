<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "ADMIN PANEL")
@section('content')
<div class="PostsHeader">
    <diV class="DashboardGrid">
        <a href="{{ route('admin.users') }}" class="GridSquare"><div>
            <p class="display-3">USERS</p>
        </div></a>
        <a href="{{ route('admin.orders') }}" class="GridSquare"><div>
            <p class="display-3">ORDERS</p>
        </div></a>
        <a href="{{ route('admin.fishOrders') }}" class="GridSquare"><div>
            <p class="display-3">ITEMS</p>
        </div></a>
        <a href="{{ route('admin.foodFishes') }}" class="GridSquare"><div>
            <p class="display-3">FOOD FISHES</p>
        </div></a>
        <a href="{{ route('admin.petFishes') }}" class="GridSquare"><div>
            <p class="display-3">PET FISHES</p>
        </div></a>
        <a href="{{ route('admin.species') }}" class="GridSquare"><div>
            <p class="display-3">SPECIES</p>
        </div></a>
        <a href="{{ route('admin.locations') }}" class="GridSquare"><div>
            <p class="display-3">LOCATIONS</p>
        </div></a>
        <a href="{{ route('admin.speciesLocations') }}" class="GridSquare"><div>
            <p class="display-3">SPECIES LOCATIONS</p>
        </div></a>
    </diV>
</div>
@endsection