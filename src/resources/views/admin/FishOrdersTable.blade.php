<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "FISH ITEMS CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">ORDER</th>
        <th scope="col">TYPE</th>
        <th scope="col">FISH</th>
        <th scope="col">QUANTITY</th>
        <th scope="col">TOTAL PRICE</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData->count())
            @foreach ($viewData as $fishOrder)
                <tr>
                    <td><a href="{{ route('admin.fishOrder', $fishOrder->getId()) }}">{{ $fishOrder->getId() }}</a></td>
                    <td><a href="{{ route('admin.order', $fishOrder->getOrderId()) }}">{{ $fishOrder->getOrderId() }}</a></td>
                    <td>{{ $fishOrder->getType() }}</td>
                    @if($fishOrder->getType() == 'PET')
                    <td><a href="{{ route('admin.petFish', $fishOrder->getPetFishesId() )}}">{{ $fishOrder->getPetFishesId() }}</a></td>
                    <td>{{ $fishOrder->getQuantityFish() }}</td>
                    @else
                    <td><a href="{{ route('admin.foodFish', $fishOrder->getFoodFishesId() )}}">{{ $fishOrder->getFoodFishesId() }}</a></td>
                    <td>{{ $fishOrder->getQuantityKG() }}</td>
                    @endif
                    <td>{{ $fishOrder->getTotalPrice() }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData->currentPage() > 1)
    <a href="{{ route("admin.fishOrders", ['page' => $viewData->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData->currentPage() < $viewData->lastPage())
    <a href="{{ route("admin.fishOrders", ['page' => $viewData->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newFishOrder') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection