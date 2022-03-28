<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "SPECIES")
@section('content')
<div class="row">
  @foreach ($viewData["species"] as $specie)
  <div class="col-md-4 col-lg-3 mb-2">
    <div class="card">
      <div class="card-body text-center">
        <a href="{{ route('specie.show', $specie->getId()) }}"
          class="btn bg-primary text-white">{{ $specie->getName() }}</a>
      </div>
    </div>
  </div>
  @endforeach
  <div class="align-self-center center-text PostsHeader">
    @if($viewData["species"]->currentPage() > 1)
    <a href="{{ route("specie.index", ['page' => $viewData["species"]->currentPage() - 1]) }}" class="mx-3">
        PREVIOUS
    </a>
    @endif
    <b>{{ $viewData["species"]->currentPage() }}</b>
    @if($viewData["species"]->currentPage() < $viewData["species"]->lastPage())
    <a href="{{ route("specie.index", ['page' => $viewData["species"]->currentPage() + 1]) }}" class="mx-3">
        NEXT
    </a>
    @endif
  </div>
</div>
@endsection