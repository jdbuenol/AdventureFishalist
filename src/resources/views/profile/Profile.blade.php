<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_profile'))
@section('content')
<div class="PostsHeader Bordered">
    <p class="display-2">{{ $viewData["user"]->getName() }}</p>
    <p><b>{{__('messages.upcase_balance')}}:</b> {{ $viewData["user"]->getBalance() }}</p>
    <p><b>{{__('messages.upcase_email')}}:</b> {{ $viewData["user"]->getEmail() }}</p>
    <p><b>{{__('messages.upcase_life_lg_ex')}}:</b> {{ $viewData["user"]->getLifeLongExpenses() }}</p>
    <p><b>{{__('messages.torders')}}:</b> {{ count($viewData["user"]->getOrders()) }}</p>
    <p><b>{{__('messages.orders')}}:</b>
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">{{__('messages.tprice')}}</th>
                <th scope="col">{{__('messages.datetime')}}</th>
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
        <button class="btn btn-danger">{{__('messages.gen_pdfhist')}}</button>
        </form>
        <form action="{{ route('profile.history') }}" method="GET">
        @csrf
        <input name="format" class="d-none" value="csv">
        <button class="btn btn-warning">{{__('messages.gen_csvhist')}}</button>
        </form>
    </div>
</div>
@endsection