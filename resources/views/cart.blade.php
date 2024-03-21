@include('layout.header')
<section class="cart mt-5" id="cart">
    <div class="container">
        <h1 class="fw-bold display-2 text-center" style="color: #d7bd94">KERANJANG</h1>
        <table class="col-sm-12 mt-5 text-white">
            <thead>
                <tr>
                <th scope="col">Produk</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Kuantitas</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    <th><img src="{{asset('images/v50_56.png')}}" class="w-25" alt=""></th>
                    <td>Jahe Gajah</td>
                    <td>20.000</td>
                    <td>1 Kg</td>
                    <td>20.000</td>
                    <td><a href="">hapus</a></td>
                </tr>
            </tbody>
        </table>
        <div class="d-grid d-md-flex justify-content-md-end mt-5">
            <button class="btn btn-dark px-5" type="button">
                Buy
            </button>
        </div>
    </div>
</section>
