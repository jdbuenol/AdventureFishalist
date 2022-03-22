<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW SPECIE")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW SPECIE
    </h1>
    <form action="{{ route('admin.createSpecie') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="Clown Fish" value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection