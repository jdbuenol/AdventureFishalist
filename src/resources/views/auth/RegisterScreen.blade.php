<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_register'))
@section('content')
<div class="PostsHeader">
    <h1>
        {{__('messages.upcase_register')}}
    </h1>
    <form action="{{ route('auth.registerUser') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="name" class="label">{{__('messages.name')}}</label>
            <input type="text" name="name" id="name" placeholder={{__('messages.name')}} value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="email" class="label">{{__('messages.upcase_email')}}</label>
            <input type="email" name="email" id="email" placeholder={{__('messages.email')}} value="{{ old('email') }}" class="form-control">
        </div>
        @error('email')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password" class="label">{{__('messages.upcase_pass')}}</label>
            <input type="password" name="password" id="password" placeholder={{__('messages.password')}} class="form-control">
        </div>
        @error('password')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="password_confirmation" class="label">{{__('messages.upcase_passagain')}}</label>
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder={{__('messages.password')}} class="form-control">
        </div>
        @error('password_confirmation')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            {{__('messages.submit')}}
        </button>
    </form>
</div>
@endsection