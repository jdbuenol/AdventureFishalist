<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "LOCATION")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">{{ $viewData->getName() }}</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>GeoLatitude: </b>{{ $viewData->getGeoLatitude() }}
    </div>
    <div class="align-self-center center-text">
    <b>GeoLongitude: </b>{{ $viewData->getGeoLongitude() }}
    </div>
    <div class="align-self-center center-text">
    <b>Country: </b>{{ $viewData->getCountry() }}
    </div>
    <div class="align-self-center center-text">
        <b>SPECIES LOCATIONS: </b>
        [
            @foreach ($viewData->getSpecieLocations() as $specieLocation)
            <a href="{{ route('admin.specieLocation', $specieLocation->getId()) }}">{{ $specieLocation->getId() }}</a>
            @endforeach
        ]
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateLocation', $viewData->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
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
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteLocation', $viewData->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection