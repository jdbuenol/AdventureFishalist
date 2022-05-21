<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "SPECIE")
@section('content')
<div class="d-flex flex-column">
    <h1 class="display-1 align-self-center">{{ $viewData["specie"]->getName() }}</h1>
    <div class="align-self-center center-text">
    <b>ID: </b>{{ $viewData["specie"]->getId() }}
    </div>
    <div class="align-self-center center-text">
        <b>SPECIES LOCATIONS: </b>
        [
            @foreach ($viewData["specie"]->getSpecieLocations() as $specieLocation)
            <a href="{{ route('admin.specieLocation', $specieLocation->getId()) }}">{{ $specieLocation->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
        <b>PET FISHES: </b>
        [
            @foreach ($viewData["specie"]->getPetFishes() as $petFish)
            <a href="{{ route('admin.petFish', $petFish->getId()) }}">{{ $petFish->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
        <b>FOOD FISHES: </b>
        [
            @foreach ($viewData["specie"]->getFoodFishes() as $foodFish)
            <a href="{{ route('admin.foodFish', $foodFish->getId()) }}">{{ $foodFish->getId() }}</a>
            @endforeach
        ]
    </div>
    <div class="align-self-center center-text">
    <b>CREATED AT: </b>{{ $viewData['specie']->getCreated_at() }}
    </div>
    <div class="align-self-center center-text">
    <b>UPDATED AT: </b>{{ $viewData['specie']->getUpdated_at() }}
    </div>
    <hr>
    <h1 class="display-2 align-self-center">UPDATE ENTRY</h1>
    <form action="{{ route('admin.updateSpecie', $viewData["specie"]->getId()) }}" method="POST" class="Submit-form align-self-center d-flex flex-column">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" placeholder="Clown Fish" value="{{ $viewData['specie']->getName() }}" class="form-control">
        </div>
        @error('name')
            <p class="red-text">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-primary my-2">
            UPDATE
        </button>
    </form>
    <hr>
    <form action="{{ route('admin.deleteSpecie', $viewData["specie"]->getId() )}}" method="POST" class="align-self-center d-flex flex-column">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger">
            DELETE THIS ENTRY
        </button>
    </form>
</div>
@endsection