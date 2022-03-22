<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW ORDER")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW ORDER
    </h1>
    <form action="{{ route('admin.createOrder') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="totalPrice" class="label">totalPrice</label>
            <input type="number" step="0.01" name="totalPrice" id="totalPrice" placeholder="69.00" value="{{ old('totalPrice') }}" class="form-control">
        </div>
        @error('totalPrice')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="user_id" class="label">USER ID</label>
            <input type="text" name="user_id" id="user_id" placeholder="user_id" value="{{ old('user_id') }}" class="form-control">
        </div>
        @if($viewData)
            <p class="red-text">{{ $viewData }}</p>
        @endif
        @error('user_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection