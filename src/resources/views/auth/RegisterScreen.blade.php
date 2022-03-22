<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "REGISTER")
@section('content')
<div class="PostsHeader">
    <h1>
        REGISTER
    </h1>
    <form action="{{ route('auth.registerUser') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="name" value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="email" class="label">E-MAIL</label>
            <input type="email" name="email" id="email" placeholder="email" value="{{ old('email') }}" class="form-control">
        </div>
        @error('email')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password" class="label">PASSWORD</label>
            <input type="password" name="password" id="password" placeholder="password" class="form-control">
        </div>
        @error('password')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password_confirmation" class="label">PASSWORD AGAIN</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="password" class="form-control">
        </div>
        @error('password_confirmation')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection