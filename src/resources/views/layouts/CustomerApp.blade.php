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
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-light bg-light NavBar">
    
    <div class="collapse navbar-collapse navlist" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto mx-4">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('shop.petShop') }}">{{__('messages.pet_shop')}}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('shop.foodShop') }}">{{__('messages.food_shop')}}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('specie.index') }}">{{__('messages.species')}}</a>
        </li>
        </ul>
        <a class="navbar-brand" href="{{ route('shop.index') }}">{{__('messages.webname')}}</a>
        <ul class="navbar-nav mr-auto mx-4">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('shop.changeLang', 'es') }}"> {{__('messages.esp')}}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('shop.changeLang', 'en') }}"> {{__('messages.eng')}}</a>
        </li>
        @auth
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('order.cart') }}">{{__('messages.upcase_cart')}}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('profile.profile') }}">{{__('messages.upcase_profile')}}</a>
        </li>
        <li class="nav-item active">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav-link logout-btn"><b>{{__('messages.upcase_logout')}}</b></button>
            </form>
        </li>
        @endauth
        @guest
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('auth.loginScreen') }}">{{__('messages.upcase_login')}}</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('auth.registerScreen') }}">{{__('messages.upcase_register')}}</a>
        </li>
        @endguest
        </ul>
    </div>
    </nav>
    @yield('content')
    <footer class="mt-auto">
        <nav class="navbar navbar-light bg-light justify-content-center bottom-navbar">
        <p class="display-5">{{__('messages.footer')}} - <a href="{{ route('allies.show') }}" class="text-black "> {{__('messages.allies')}}</a></p>
        </nav>
    </footer>
</body>
</html>