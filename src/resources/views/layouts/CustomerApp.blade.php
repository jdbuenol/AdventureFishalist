<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/CustomerApp.css') }}">
</head>
<body>
    <nav class="NavBar">
        <ul class="NavLinks">
            <li>
                <b><a href="{{ route('shop.petShop') }}">PET-SHOP</a></b>
            </li>
            <li>
                <b><a href="{{ route('shop.foodShop') }}">FOOD-SHOP</a></b>
            </li>
            <li>
                <b><a href="{{ route('specie.index') }}">SPECIES</a></b>
            </li>
        </ul>
        <a href="{{ route('shop.index') }}"><h1>ADVENTURE FISHALIST</h1></a>
        @auth
        <ul class="NavLinks">
            <li>
                <b><a>CART</a></b>
            </li>
            <li>
                <b><a>PROFILE</a></b>
            </li>
            <li>
                <b><a>LOGOUT</a></b>
            </li>
        </ul>
        @endauth
        @guest
        <ul class="NavLinks">
            <li>
                <b><a href="{{ route('auth.loginScreen') }}">LOGIN</a></b>
            </li>
            <li>
                <b><a href="{{ route('auth.registerScreen') }}">REGISTER</a></b>
            </li>
        </ul>
        @endguest
    </nav>
    @yield('content')
</body>
</html>