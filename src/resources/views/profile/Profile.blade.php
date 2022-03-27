<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', "PROFILE")
@section('content')
<p>WELCOME {{ auth()->user()->getName() }}!</p>
@endsection