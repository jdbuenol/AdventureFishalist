<!-- AUTHOR: JULIAN BUENO -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/AdminApp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sideBar.css') }}">
    <script src="{{ asset('js/sideBar.js') }}"></script>
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light"><a href="{{ route('admin.index') }}">Start Bootstrap</a></div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{ route('admin.users') }}">Users</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Orders</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Items</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Food Fishes</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Pet Fishes</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Species</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Locations</a>
                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Species Locations</a>
            </div>
        </div>
        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            @yield('content')
        </div>
    </div>
</body>
</html>
