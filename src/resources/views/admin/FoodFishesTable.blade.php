<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.AdminApp')
@section('title', "FOOD FISHES CRUD")
@section('content')
<div class="d-flex flex-column">
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">price (Per KG)</th>
        <th scope="col">cut</th>
        <th scope="col">inventory(KG)</th>
        <th scope="col">specie</th>
      </tr>
    </thead>
    <tbody>
        @if($viewData->count())
            @foreach ($viewData as $foodFish)
                <tr>
                    <td><a href="{{ route('admin.foodFish', $foodFish->getId()) }}">{{ $foodFish->getId() }}</a></td>
                    <td>{{ $foodFish->getPricePerKG() }}</td>
                    <td>{{ $foodFish->getCut() }}</td>
                    <td>{{ $foodFish->getInventoryKG() }}</td>
                    <td><a href="{{ route('admin.specie', $foodFish->getSpecieId()) }}">{{ $foodFish->getSpecie()->getName() }}</a></td>
                </tr>
            @endforeach
        @endif
    </tbody>
  </table>
  <div class="align-self-center center-text">
    @if($viewData->currentPage() > 1)
    <a href="{{ route("admin.foodFishes", ['page' => $viewData->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    @if($viewData->currentPage() < $viewData->lastPage())
    <a href="{{ route("admin.foodFishes", ['page' => $viewData->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
  <a href="{{ route('admin.newFoodFish') }}" class="align-self-center center-text">
      <button class="btn btn-primary"> NEW ENTRY </button>
  </a>
</div>
@endsection