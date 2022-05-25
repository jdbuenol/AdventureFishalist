<!-- AUTHOR: JULIAN BUENO -->
@extends('layouts.CustomerApp')
@section('title', __('messages.upcase_cart'))
@section('content')
<div class="PostsHeader Bordered">
    <p>{{ $viewData['message'] }}</p>
</div>
@endsection