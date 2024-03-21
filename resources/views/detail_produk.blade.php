@include('layout.header')

<section class="detail_produk mt-5" id="detail_produk">
    <div class="container">
        <div class="row">
            <div class="col">
                <img src="{{asset('images/v50_56.png')}}" class="rounded mx-auto d-block" alt="">
            </div>
            <div class="col">
                <h1 class="fw-bold display-1">jahe gajah</h1>
                <p class="text-white">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Suscipit illum amet fugiat asperiores quia, consectetur tenetur nostrum quaerat enim explicabo tempora inventore sint itaque voluptatum quibusdam in recusandae doloremque rerum.</p>
                <div class="input-group mb-3" style="width: 220px;">
                    <button class="btn btn-dark border border-secondary px-3" type="button" id="button-addon1" data-mdb-ripple-color="dark">
                        <i class="fa fa-minus"></i>
                    </button>
                    <input type="text" class="form-control text-center border border-secondary" placeholder="14" aria-label="Example text with button addon" aria-describedby="button-addon1" />
                    <button class="btn btn-dark border border-secondary px-3" type="button" id="button-addon2" data-mdb-ripple-color="dark">
                        <i class="fa fa-plus"></i>
                    </button>
                    <select class="form-select" aria-label="Default select example" required>
                        <option selected>Open this select menu</option>
                        <option value="">Kg</option>
                        <option value="">Kwintal</option>
                        <option value="">ton</option>
                    </select>
                </div>
                <button class="btn btn-dark px-5" type="button">
                    Buy
                </button>
            </div>
        </div>
    </div>
</section>
