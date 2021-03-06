<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "ORDERS CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">totalPrice</th>
        <th scope="col">user</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData["allOrders"]->count())
            @foreach ($viewData["allOrders"] as $order)
                <tr>
                    <td><a href="{{ route('admin.order', $order->getId()) }}">{{ $order->getId() }}</a></td>
                    <td>{{ $order->getTotalPrice() }}</td>
                    <td><a href="{{ route('admin.user', $order->getUserId() )}}">{{ $order->getUser()->getName() }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData["allOrders"]->currentPage() > 1)
    <a href="{{ route("admin.orders", ['page' => $viewData["allOrders"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData["allOrders"]->currentPage() < $viewData["allOrders"]->lastPage())
    <a href="{{ route("admin.orders", ['page' => $viewData["allOrders"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newOrder') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection