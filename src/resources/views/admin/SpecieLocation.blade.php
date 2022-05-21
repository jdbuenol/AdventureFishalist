<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "SPECIE LOCATION")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">SPECIE LOCATION</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData['specieLocation']->getId() }}
    </div>
    <div class="align-self-center center-text">
    <b>POBLATIONAL DENSITY(fishes/km&sup2;): </b>{{ $viewData['specieLocation']->getPoblationalDensity() }}
    </div>
    <div class="align-self-center center-text">
    <b>LOCATION: </b><a href="{{ route('admin.location', $viewData['specieLocation']->getLocationId())}}">{{ $viewData['specieLocation']->getLocation()->getName() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>SPECIE: </b><a href="{{ route('admin.specie', $viewData['specieLocation']->getSpecieId()) }}">{{ $viewData['specieLocation']->getSpecie()->getName() }}</a>
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['specieLocation']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['specieLocation']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateSpecieLocation', $viewData['specieLocation']->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="poblatonalDensity" class="label">POBLATIONAL DENSITY (FISHES/KM&sup2;)</label>
            <input type="number" step="0.01" name="poblationalDensity" id="poblationalDensity" placeholder="69.00" value="{{ $viewData["specieLocation"]->getPoblationalDensity() }}" class="form-control">
        </div>
        @error('poblationalDensity')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="location_id" class="label center-text">LOCATION ID</label>
            <input type="text" name="location_id" id="location_id" placeholder="location_id" value="{{ $viewData["specieLocation"]->getLocationId() }}" class="form-control">
        </div>
        @error('location_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="specie_id" class="label center-text">SPECIE ID</label>
            <input type="text" name="specie_id" id="specie_id" placeholder="specie_id" value="{{ $viewData["specieLocation"]->getSpecieId() }}" class="form-control">
        </div>
        @error('specie_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if($viewData['error'])
            <p class="red-text">{{ $viewData['error'] }}</p>
        @endif
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteSpecieLocation', $viewData['specieLocation']->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection