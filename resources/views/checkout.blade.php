@include('layout.header')
<div class="container text-white mt-5">
      <div class="row">
          <div class="col-md-4 order-md-2 mb-4">
              <h4 class="d-flex justify-content-between align-items-center mb-3">
                  <span>Your cart</span>
                  <span class="badge badge-secondary badge-pill">{{ Cart::content()->count() }}</span>
                </h4>
                <ul class="list-group mb-3">
                @foreach (Cart::content() as $item)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <h6 class="my-0">{{ $item->name }} ({{ $item->qty }} Kg) </h6>
                    <span class="text-muted">Rp. {{ $item->price }}</span>
                </li>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (Rp)</span>
                    <strong>Rp. {{ Cart::subtotal() }}</strong>
                </li>
                </ul>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="mb-3">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Name">
              <div class="invalid-feedback">
                Name
              </div>
            </div>
            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Address</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" placeholder="" required>
                <div class="invalid-feedback">
                  Kota required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" class="form-control" placeholder="" required>
                <div class="invalid-feedback">
                  kecamatan required.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="kodepos">Kode Pos</label>
                <input type="text" class="form-control" id="zip" placeholder="" required>
                <div class="invalid-feedback">
                  Zip code required.
                </div>
              </div>
            </div>
            <h4 class="mb-3">Payment</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
                <label class="custom-control-label" for="credit">COD</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
                <label class="custom-control-label" for="debit">Debit card</label>
              </div>
            </div>

            <hr class="mb-5 mt-5">
            <button class="btn btn-dark btn-lg btn-block" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>

      @include('layout.footer')
