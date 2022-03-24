<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "SPECIE LOCATION")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">SPECIE LOCATION</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>POBLATIONAL DENSITY: </b>{{ $viewData->getPoblationalDensity() }}
    </div>
    <div class="align-self-center center-text">
    <b>LOCATION: </b><a href="{{ route('admin.location', $viewData->getLocationId())}}">{{ $viewData->getLocation()->getName() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>SPECIE: </b><a href="{{ route('admin.specie', $viewData->getSpecieId()) }}">{{ $viewData->getSpecie()->getName() }}</a>
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateSpecieLocation', $viewData->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="poblatonalDensity" class="label">Total Price</label>
            <input type="number" step="0.01" name="poblationalDensity" id="poblationalDensity" placeholder="69.00" value="{{ old('poblationalDensity') }}" class="form-control">
        </div>
        @error('poblationalDensity')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="location_id" class="label center-text">LOCATION ID</label>
            <input type="text" name="location_id" id="location_id" placeholder="location_id" value="{{ old('location_id') }}" class="form-control">
        </div>
        @error('location_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="specie_id" class="label center-text">SPECIE ID</label>
            <input type="text" name="specie_id" id="specie_id" placeholder="specie_id" value="{{ old('specie_id') }}" class="form-control">
        </div>
        @error('specie_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteSpecieLocation', $viewData->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection