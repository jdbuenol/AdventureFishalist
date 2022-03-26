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
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateOrder', $viewData['order']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="totalPrice" class="label">Total Price</label>
            <input type="number" step="0.01" name="totalPrice" id="totalPrice" placeholder="69.00" value="{{ old('totalPrice') }}" class="form-control">
        </div>
        @error('totalPrice')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="user_id" class="label center-text">USER ID</label>
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value="{{ old('user_id') }}" class="form-control">
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