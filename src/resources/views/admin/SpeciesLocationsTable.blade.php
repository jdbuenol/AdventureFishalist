<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "SPECIES-LOCATIONS CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Poblational Density</th>
        <th scope="col">Location</th>
        <th scope="col">Specie</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData->count())
            @foreach ($viewData as $specieLocation)
                <tr>
                    <td><a href="{{ route('admin.specieLocation', $specieLocation->getId()) }}">{{ $specieLocation->getId() }}</a></td>
                    <td>{{ $specieLocation->getPoblationalDensity() }}</td>
                    <td><a href="{{ route('admin.location', $specieLocation->getLocationId() )}}">{{ $specieLocation->getLocation()->getName() }}</a></td>
                    <td><a href="{{ route('admin.specie', $specieLocation->getSpecieId() )}}">{{ $specieLocation->getSpecie()->getName() }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData->currentPage() > 1)
    <a href="{{ route("admin.speciesLocations", ['page' => $viewData->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData->currentPage() < $viewData->lastPage())
    <a href="{{ route("admin.speciesLocations", ['page' => $viewData->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newSpecieLocation') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection