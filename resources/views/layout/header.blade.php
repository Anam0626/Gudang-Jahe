<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gudang Jahe</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="icon" href="{{asset('images/v21_13.png')}}" type="image/icon type">
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="{{asset('images/v21_13.png')}}" width="150" height="70" alt=""></a>
            <div class="collapse navbar-collapse justify-content-center flex-grow-1" id="navbarTogglerDemo01">
                <ul class="navbar-nav">
                    <li class="nav-item mx-5">
                    <a class="nav-link active text-white fw-bolder" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item mx-5">
                    <a class="nav-link active text-white fw-bolder" aria-current="page" href="#about">About</a>
                    </li>
                    <li class="nav-item mx-5">
                    <a class="nav-link active text-white fw-bolder" aria-current="page" href="">Product</a>
                    </li>
                    <li class="nav-item mx-5">
                    <a class="nav-link active text-white fw-bolder" aria-current="page" href="">Testimoni</a>
                    </li>
                </ul>
            </div>
            <div class="icon d-flex gap-5">
                <a href=""><img src="{{asset('images/grocery-store.png')}}" width="20" height="20" alt=""></a>
                <a href="/login"><img src="{{asset('images/user.png')}}" width="20" height="20" alt=""></a>
            </div>
            <button class="navbar-toggler bg-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
