<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW LOCATION")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW LOCATIONS
    </h1>
    <form action="{{ route('admin.createLocation') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="great coral reef" value="{{ old('name') }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="geoLatitude" class="label">Geo Latitude</label>
            <input type="number" step="0.01" name="geoLatitude" id="geoLatitude" placeholder="42.00" value="{{ old('geoLatitude') }}" class="form-control">
        </div>
        @error('geoLatitude')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="geoLongitude" class="label">Geo Longitude</label>
            <input type="number" step="0.01" name="geoLongitude" id="geoLongitude" placeholder="-69.00" value="{{ old('geoLongitude') }}" class="form-control">
        </div>
        @error('geoLongitude')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="country" class="label">Country</label>
            <input type="text" name="country" id="country" placeholder="Germany" value="{{ old('country') }}" class="form-control">
        </div>
        @error('country')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection