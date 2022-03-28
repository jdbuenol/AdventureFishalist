<!-- AUTHOR: JULIAN BUENO -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/CustomerApp.css') }}">
</head>
<body>
    <nav class="NavBar">
        <ul class="NavLinks">
            <li>
                <b><a href="{{ route('shop.petShop') }}" class="nav--link">PET-SHOP</a></b>
            </li>
            <li>
                <b><a href="{{ route('shop.foodShop') }}" class="nav--link">FOOD-SHOP</a></b>
            </li>
            <li>
                <b><a href="{{ route('specie.index') }}" class="nav--link">SPECIES</a></b>
            </li>
        </ul>
        <a href="{{ route('shop.index') }}" class="nav--link"><h1>ADVENTURE FISHALIST</h1></a>
        @auth
        <ul class="NavLinks">
            <li>
                <b><a href="{{ route('order.cart') }}" class="nav--link">CART</a></b>
            </li>
            <li>
                <b><a href="{{ route('profile.profile') }}" class="nav--link">PROFILE</a></b>
            </li>
            <li>
                <form action="{{ route('auth.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav--link"><b>LOGOUT</b></button>
                </form>
            </li>
        </ul>
        @endauth
        @guest
        <ul class="NavLinks">
            <li>
                <b><a href="{{ route('auth.loginScreen') }}" class="nav--link">LOGIN</a></b>
            </li>
            <li>
                <b><a href="{{ route('auth.registerScreen') }}" class="nav--link">REGISTER</a></b>
            </li>
        </ul>
        @endguest
    </nav>
    @yield('content')
</body>
</html>