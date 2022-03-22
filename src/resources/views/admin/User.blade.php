<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "USER")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">{{ $viewData->getName() }} </h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>EMAIL: </b>{{ $viewData->getEmail() }}
    </div>
    <div class="align-self-center center-text">
    <b>PASSWORD: </b>{{ $viewData->getPassword() }}
    </div>
    <div class="align-self-center center-text">
    <b>isAdmin: </b>{{ $viewData->isAdmin() }}
    </div>
    <div class="align-self-center center-text">
        <b>ORDERS: </b>
        [
            @foreach ($viewData->orders as $order)
            <a href="{{ route('admin.order', $order->getId()) }}">{{ $order->getId() }}</a>
            @endforeach
        ]
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateUser', $viewData->id) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="name" value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="email" class="label center-text">E-MAIL</label>
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
            <label for="isAdmin" class="label">IS ADMIN</label>
            <input type="checkbox" name="isAdmin" id="isAdmin">
        </div>
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteUser', $viewData->id )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection