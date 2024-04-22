<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gudang Jahe</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('images/v21_13.png')}}" type="image/icon type">
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="{{ asset('js/jquery.js') }}"></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/"><img src="{{asset('images/v21_13.png')}}" width="150" height="70" alt=""></a>
            @if (Route::currentRouteName() == '')
                <div class="collapse navbar-collapse justify-content-center flex-grow-1" id="navbarTogglerDemo01">
                    <ul class="navbar-nav">
                        <li class="nav-item mx-5">
                        <a class="nav-link fw-bolder" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item mx-5">
                        <a class="nav-link fw-bolder" aria-current="page" href="#about">About</a>
                        </li>
                        <li class="nav-item mx-5">
                        <a class="nav-link fw-bolder" aria-current="page" href="#product">Product</a>
                        </li>
                        <li class="nav-item mx-5">
                        <a class="nav-link fw-bolder" aria-current="page" href="#contact">Contact</a>
                        </li>
                    </ul>
                </div>
            @endif
            <div class="icon d-flex gap-5">
                <a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i></a>
                @auth
                <a href="{{route('logout')}}"><i class="fa fa-user"></i></a>
                @else
                <a href="{{route('login')}}"><i class="fa fa-sign-in"></i></a>
                @endauth
            </div>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
