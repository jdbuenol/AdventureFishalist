<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "SPECIES CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData["allSpecies"]->count())
            @foreach ($viewData["allSpecies"] as $specie)
                <tr>
                    <td>{{ $specie->getId() }}</td>
                    <td><a href="{{ route('admin.specie', $specie->getId())}}">{{ $specie->getName() }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData["allSpecies"]->currentPage() > 1)
    <a href="{{ route("admin.species", ['page' => $viewData["allSpecies"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData["allSpecies"]->currentPage() < $viewData["allSpecies"]->lastPage())
    <a href="{{ route("admin.species", ['page' => $viewData["allSpecies"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newSpecie') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection