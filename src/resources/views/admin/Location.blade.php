<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "LOCATION")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">{{ $viewData["location"]->getName() }}</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData["location"]->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>GeoLatitude: </b>{{ $viewData["location"]->getGeoLatitude() }}
    </div>
    <div class="align-self-center center-text">
    <b>GeoLongitude: </b>{{ $viewData["location"]->getGeoLongitude() }}
    </div>
    <div class="align-self-center center-text">
    <b>Country: </b>{{ $viewData["location"]->getCountry() }}
    </div>
    <div class="align-self-center center-text">
        <b>SPECIES LOCATIONS: </b>
        [
            @foreach ($viewData["location"]->getSpecieLocations() as $specieLocation)
            <a href="{{ route('admin.specieLocation', $specieLocation->getId()) }}">{{ $specieLocation->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['location']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['location']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateLocation', $viewData["location"]->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="great coral reef" value="{{ $viewData["location"]->getName() }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="geoLatitude" class="label">Geo Latitude</label>
            <input type="number" step="0.01" name="geoLatitude" id="geoLatitude" placeholder="42.00" value="{{ $viewData["location"]->getGeoLatitude() }}" class="form-control">
        </div>
        @error('geoLatitude')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="geoLongitude" class="label">Geo Longitude</label>
            <input type="number" step="0.01" name="geoLongitude" id="geoLongitude" placeholder="-69.00" value="{{ $viewData["location"]->getGeoLongitude() }}" class="form-control">
        </div>
        @error('geoLongitude')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="country" class="label">Country</label>
            <input type="text" name="country" id="country" placeholder="Germany" value="{{ $viewData["location"]->getCountry() }}" class="form-control">
        </div>
        @error('country')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteLocation', $viewData["location"]->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection