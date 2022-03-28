<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "PROFILE")
@section('content')
<div class="PostsHeader Bordered">
    <p class="display-2">{{ $viewData->getName() }}</p>
    <p><b>BALANCE:</b> {{ $viewData->getBalance() }}</p>
    <p><b>EMAIL:</b> {{ $viewData->getEmail() }}</p>
    <p><b>LIFE LONG EXPENSES:</b> {{ $viewData->getLifeLongExpenses() }}</p>
    <p><b>TOTAL ORDERS:</b> {{ count($viewData->getOrders()) }}</p>
    <p><b>ORDERS:</b>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">TotalPrice</th>
                <th scope="col">DateTime</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($viewData->getOrders() as $order)
                    <tr>
                        <td>{{ $order->getId() }}</td>
                        <td>{{ $order->getTotalPrice() }}</td>
                        <td>{{ $order->getCreated_at() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </p>
</div>
@endsection