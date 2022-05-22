<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "PROFILE")
@section('content')
<div class="PostsHeader Bordered">
    <p class="display-2">{{ $viewData["user"]->getName() }}</p>
    <p><b>BALANCE:</b> {{ $viewData["user"]->getBalance() }}</p>
    <p><b>EMAIL:</b> {{ $viewData["user"]->getEmail() }}</p>
    <p><b>LIFE LONG EXPENSES:</b> {{ $viewData["user"]->getLifeLongExpenses() }}</p>
    <p><b>TOTAL ORDERS:</b> {{ count($viewData["user"]->getOrders()) }}</p>
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
                @foreach ($viewData["user"]->getOrders() as $order)
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
<div class="PostsHeader Bordered">
    <div class="d-flex justify-content-center btns-gap">
        <form action="{{ route('profile.history') }}" method="GET">
        @csrf
        <input name="format" class="d-none" value="pdf">
        <button class="btn btn-danger">GENERATE PDF HISTORY</button>
        </form>
        <form action="{{ route('profile.history') }}" method="GET">
        @csrf
        <input name="format" class="d-none" value="csv">
        <button class="btn btn-warning">GENERATE CSV HISTORY</button>
        </form>
    </div>
</div>
@endsection