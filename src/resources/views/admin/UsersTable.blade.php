<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "USERS CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">balance</th>
        <th scope="col">email</th>
        <th scope="col">password</th>
        <th scope="col">isAdmin</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData["allUsers"]->count())
            @foreach ($viewData["allUsers"] as $user)
                <tr>
                    <td>{{ $user->getId() }}</td>
                    <td><a href="{{ route('admin.user', $user->getId())}}">{{ $user->getName() }}</a></td>
                    <td>{{ $user->getBalance() }}</td>
                    <td>{{ $user->getEmail() }}</td>
                    <td>{{ $user->getPassword() }}</td>
                    <td>{{ $user->isAdmin() }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData["allUsers"]->currentPage() > 1)
    <a href="{{ route("admin.users", ['page' => $viewData["allUsers"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData["allUsers"]->currentPage() < $viewData["allUsers"]->lastPage())
    <a href="{{ route("admin.users", ['page' => $viewData["allUsers"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newUser') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection