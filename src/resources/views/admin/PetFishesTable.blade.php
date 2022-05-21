<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "PET FISHES CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">price</th>
        <th scope="col">size</th>
        <th scope="col">inventory</th>
        <th scope="col">specie</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData["allPetFishes"]->count())
            @foreach ($viewData["allPetFishes"] as $petFish)
                <tr>
                    <td><a href="{{ route('admin.petFish', $petFish->getId()) }}">{{ $petFish->getId() }}</a></td>
                    <td>{{ $petFish->getPrice() }}</td>
                    <td>{{ $petFish->getSize() }}</td>
                    <td>{{ $petFish->getInventory() }}</td>
                    <td><a href="{{ route('admin.specie', $petFish->getSpecieId()) }}">{{ $petFish->getSpecie()->getName() }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData["allPetFishes"]->currentPage() > 1)
    <a href="{{ route("admin.petFishes", ['page' => $viewData["allPetFishes"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData["allPetFishes"]->currentPage() < $viewData["allPetFishes"]->lastPage())
    <a href="{{ route("admin.petFishes", ['page' => $viewData["allPetFishes"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newPetFish') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection