<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gudang Jahe</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
</head>
<body>
    <section class="vh-100" style="background-color: black;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-">
                    <h3 class="mb-4 text-center" style="color: #d7bd94">Sign in</h3>
                    <div class="card shadow-2-strong" style="border-radius: 1rem; background-color: #d7bd94">
                        <div class="card-body p-5 text-center">
                            <form action="{{url('check_login')}}" method="POST">
                                @csrf
                                <div class="form-outline mb-4">
                                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" required/>
                                </div>

                                <div class="form-outline mb-4">
                                <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" required/>
                                </div>

                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                                <div class="form-group col-lg-12 mx-auto d-flex align-items-center justify-content-center my-4">
                                <div class="border-bottom w-25 ml-5"></div>
                                <span class="px-2 small text-muted fw-bold text-muted">Sign With</span>
                                <div class="border-bottom w-25 mr-5"></div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
