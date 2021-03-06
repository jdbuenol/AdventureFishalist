<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "USER")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">{{ $viewData["user"]->getName() }} </h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData["user"]->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>BALANCE: </b>{{ $viewData["user"]->getBalance() }}
    </div>
    <div class="align-self-center center-text">
    <b>EMAIL: </b>{{ $viewData["user"]->getEmail() }}
    </div>
    <div class="align-self-center center-text">
    <b>PASSWORD: </b>{{ $viewData["user"]->getPassword() }}
    </div>
    <div class="align-self-center center-text">
    <b>isAdmin: </b>{{ $viewData["user"]->isAdmin() }}
    </div>
    <div class="align-self-center center-text">
        <b>ORDERS: </b>
        [
            @foreach ($viewData["user"]->getOrders() as $order)
            <a href="{{ route('admin.order', $order->getId()) }}">{{ $order->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['user']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['user']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateUser', $viewData["user"]->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="name" value="{{ $viewData["user"]->getName() }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="balance" class="label">Balance</label>
            <input type="text" name="balance" id="balance" placeholder="109" value="{{ $viewData["user"]->getBalance() }}" class="form-control">
        </div>
        @error('balance')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="email" class="label center-text">E-MAIL</label>
            <input type="email" name="email" id="email" placeholder="email" value="{{ $viewData["user"]->getEmail() }}" class="form-control">
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
            <input type="checkbox" name="isAdmin" id="isAdmin" {{ $viewData["user"]->isAdmin() ? "Checked" : ""}}>
        </div>
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteUser', $viewData["user"]->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection