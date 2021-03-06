<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "ORDER")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">ORDER</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData['order']->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>Total Price: </b>{{ $viewData['order']->getTotalPrice() }}
    </div>
    <div class="align-self-center center-text">
    <b>USER: </b><a href="{{ route('admin.user', $viewData['order']->getUserId()) }}">{{ $viewData['order']->getUser()->getName() }}</a>
    </div>
    <div class="align-self-center center-text">
        <b>FISH ITEMS: </b>
        [
            @foreach ($viewData['order']->getFishOrders() as $fishOrder)
            <a href="{{ route('admin.fishOrder', $fishOrder->getId()) }}">{{ $fishOrder->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['order']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['order']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateOrder', $viewData['order']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id" class="label center-text">USER ID</label>
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value="{{ $viewData['order']->getUserId() }}" class="form-control">
        </div>
        @if($viewData['error'])
            <p class="red-text">{{ $viewData['error'] }}</p>
        @endif
        @error('user_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteOrder', $viewData['order']->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection