@include('layout.header')
<div class="container">
    <section class="home" id="home">
        <div class="row">
            <div class="left col-sm-6">
                <img src="{{asset('images/mockup-graphics-1q4IIdEnIWA-unsplash-removebg-preview.png')}}" class="img-fluid" alt="">
            </div>
            <div class="right col-sm-6 align-self-center">
                <h1 class="text-uppercase display-1 fw-bold" style="color: #ffffff;">gudang</h1>
                <h1 class="text-uppercase display-1 fw-bold" style="color: #D7BD94;">JAHE</h1>
                <p class="col-sm-8" style="color: #ffffff">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero assumenda vitae, provident ratione harum, esse recusandae reprehenderit illo, quia nobis aliquid. Eveniet magni, corrupti tempora eligendi sed natus voluptatibus voluptates.
                </p>
            </div>
        </div>
    </section>
    <section class="about" id="about">
        <h1 class="text-uppercase display-6 fw-bold text-center" style="color: #ffffff;"><a style="color: #D7BD94">about</a> us</h1>
        <div class="row">
            <div class="left col-sm-6 d-flex justify-content-center align-self-center">
                <p class="col-sm-8" style="color: #ffffff">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde blanditiis fugit, sapiente minus hic ut vero architecto illo dicta dolor, voluptatibus consequatur perferendis officiis quod, laborum incidunt nostrum impedit ullam?</p>
            </div>
            <div class="right col-sm-5">
                <div class="image">
                    <img src="{{asset('images/v50_56.png')}}" class="img-fluid" alt="">
                </div>
                <div class="images d-flex justify-content-end">
                    <img src="{{asset('images/v31_19.png')}}" class="img-fluid" alt="">
                </div>
                <div class="image">
                    <img src="{{asset('images/v31_20.png')}}" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="product" id="product">
        <h1 class="text-uppercase display-6 fw-bold text-center" style="color: #ffffff;">Our <a style="color: #D7BD94">Product</a></h1>
        <div class="row gap-5 m-5 justify-content-center">
            <div class="col col-md-auto">
                <img src="{{asset('images/v50_56.png')}}" alt="">
                <div class="item d-flex">
                    <p class="fw-bold flex-grow-1">Jahe</p>
                    <a href="{{route('detail_produk')}}"><i class="fa fa-shopping-bag"></i></a>
                </div>
            </div>
            <div class="col col-md-auto">
                <img src="{{asset('images/v31_19.png')}}" alt="">
                <div class="item d-flex">
                    <p class="fw-bold flex-grow-1">Jahe</p>
                    <a href=""><i class="fa fa-shopping-bag"></i></a>
                </div>
            </div>
            <div class="col col-md-auto">
                <img src="{{asset('images/v31_20.png')}}" alt="">
                <div class="item d-flex">
                    <p class="fw-bold flex-grow-1">Jahe</p>
                    <a href=""><i class="fa fa-shopping-bag"></i></a>
                </div>
            </div>
            <div class="col col-md-auto">
                <img src="{{asset('images/v31_20.png')}}" alt="">
                <div class="item d-flex">
                    <p class="fw-bold flex-grow-1">Jahe</p>
                    <a href=""><i class="fa fa-shopping-bag"></i></a>
                </div>
            </div>
        </div>
    </section>
    <section class="testimoni" id="testimoni">
        <h1 class="text-uppercase display-6 fw-bold text-center" style="color: #ffffff;"><span style="color: #D7BD94">WHY</span> PEOPLE <span style="color: #D7BD94">BELIEVE</span> IN US</h1>
        <div class='container-fluid mx-auto mt-5 mb-5 col-12' style="text-align: center">
    <p><small class="text-muted">Always render more and better service than <br />is expected of you, no matter what your ask may be.</small></p>
    <div class="row" style="justify-content: center">
        <div class="card col-md-3 col-12">
            <div class="card-content">
                <div class="card-body"> <img class="img" src="https://i.imgur.com/S7FJza5.png" />
                    <div class="shadow"></div>
                    <div class="card-title"> We're Free </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted">We spent thousands of hours creating on algorithm that does this for you in seconds. We collect a small fee from the professional after they meet your</small> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img class="img" src="https://i.imgur.com/xUWJuHB.png" />
                    <div class="card-title"> We're Unbiased </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted"> We don't accept ads from anyone. We use actual data to match you who the best person for each job </small> </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card col-md-3 col-12 ml-2">
            <div class="card-content">
                <div class="card-body"> <img class="img rck" src="https://i.imgur.com/rG3CGn3.png" />
                    <div class="card-title"> We Guide you </div>
                    <div class="card-subtitle">
                        <p> <small class="text-muted">Buying or selling a home is often the largest transaction anyone does in their life. we guide you through the process so that you can be confident in reaching your dream outcome.</small> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </section>
    <section class="contact" id="contact">
        <h1 class="text-uppercase display-6 fw-bold text-center" style="color: #ffffff;">you want a <a style="color: #D7BD94">ginger</a><br><a style="color: #D7BD94">contact</a> us</h1>
        <div class="row justify-content-center">
            <div class="right col-md-auto mt-10">
                <h6 class="text-white">Write to Us</h6>
                <a href=""><img src="{{asset('images/v50_36.png')}}" class="pb-4"></a>
                <h6 class="text-white">Call us the number</h6>
                <p class="pb-3">081259051602</p>
                <h6 class="text-white">Find us here</h6>
                <p>JL.Jaksa Agung Suprapto III/15</p>
            </div>
            <div class="left col-md-auto">
                <img src="{{asset('images/mockup-graphics-1q4IIdEnIWA-unsplash-removebg-preview.png')}}" class="img-fluid" alt="">
            </div>
        </div>
    </section>
</div>

@include('layout.footer')
