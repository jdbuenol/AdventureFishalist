<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_login'))
@section('content')
<div class="PostsHeader">
    <h1>
    {{__('messages.upcase_login')}}
    </h1>
    <form action="{{ route('auth.login') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="email" class="label">{{__('messages.upcase_email')}}</label>
            <input type="email" name="email" id="email" placeholder={{__('messages.upcase_email')}} class="form-control">
        </div>
        @error('email')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password" class="label">{{__('messages.upcase_pass')}}</label>
            <input type="password" name="password" id="password" placeholder={{__('messages.password')}} class="form-control">
        </div>
        <div class="form-group mt-3">
            <input type="checkbox" name="remember" id="remember"> {{__('messages.rememberme')}}
        </div>
        @error('password')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if(session('viewData'))
            <p class="red-text">{{ session('viewData')["message"] }}</p>
        @endif
        <button class="btn btn-primary mt-3">
            {{__('messages.submit')}}
        </button>
    </form>
</div>
@endsection