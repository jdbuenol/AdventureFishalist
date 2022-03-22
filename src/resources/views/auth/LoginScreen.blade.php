<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "LOGIN")
@section('content')
<div class="PostsHeader">
    <h1>
        LOGIN
    </h1>
    <form action="{{ route('auth.login') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="email" class="label">E-MAIL</label>
            <input type="email" name="email" id="email" placeholder="email" class="form-control">
        </div>
        @error('email')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password" class="label">PASSWORD</label>
            <input type="password" name="password" id="password" placeholder="password" class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="checkbox" name="remember" id="remember"> REMEMBER ME
        </div>
        @error('password')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if(session('viewData'))
            <p class="red-text">{{ session('viewData') }}</p>
        @endif
        <button class="btn btn-primary mt-3">
            SUBMIT
        </button>
    </form>
</div>
@endsection