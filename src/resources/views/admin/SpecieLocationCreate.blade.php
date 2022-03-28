<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "NEW SPECIE LOCATION")
@section('content')
<div class="PostsHeader">
    <h1>
        NEW SPECIE LOCATION
    </h1>
    <form action="{{ route('admin.createSpecieLocation') }}" method="POST" class="SubmitForm">
        @csrf
        <div class="form-group">
            <label for="poblationalDensity" class="label">Poblational Density (fishes/km&sup2;)</label>
            <input type="number" step="0.01" name="poblationalDensity" id="poblationalDensity" placeholder="69.00" value="{{ old('poblationalDensity') }}" class="form-control">
        </div>
        @error('poblationalDensity')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="location_id" class="label">LOCATION ID</label>
            <input type="text" name="location_id" id="location_id" placeholder="location_id" value="{{ old('location_id') }}" class="form-control">
        </div>
        @error('location_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <div class="form-group">
            <label for="specie_id" class="label">SPECIE ID</label>
            <input type="text" name="specie_id" id="specie_id" placeholder="specie_id" value="{{ old('specie_id') }}" class="form-control">
        </div>
        @error('specie_id')
            <p class="red-text">{{ $message }}</p>
        @enderror
        @if($viewData)
            <p class="red-text">{{ $viewData }}</p>
        @endif
        <button type="submit" class="btn btn-primary my-5">
            SUBMIT
        </button>
    </form>
</div>
@endsection