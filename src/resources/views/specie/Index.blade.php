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
  <ul class="pagination justify-content-center">
    @if($viewData["species"]->currentPage() > 1)
    <li class="page-item"><a class="page-link" href="{{ route("specie.index", ['page' => $viewData["species"]->currentPage() - 1]) }}">Previous</a></li>
    @endif
    <li class="page-item disabled"><b class="page-link">{{ $viewData["species"]->currentPage() }}</b></li>
    @if($viewData["species"]->currentPage() < $viewData["species"]->lastPage())
    <li class="page-item"><a class="page-link" href="{{ route("specie.index", ['page' => $viewData["species"]->currentPage() + 1]) }}">Next</a></li>
    @endif
  </ul>
</div>
@endsection