@include('header')


<section class="h-100 gradient-custom">
    <div class="container py-5">
      <div class="row d-flex justify-content-center my-4">
        <div class="col-md-8">
          <div class="card mb-4">
            <div class="card-header py-3">
              <h5 class="mb-0">Your Shopping Carts
                @if($cartItems->isEmpty())
    <p>Your cart is empty.</p>
@else
              </h5>
            </div>
            <div class="card-body">
              <!-- Single item -->
              @foreach($cartItems as $item)

              <div class="row">
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                  <!-- Image -->
                  <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                    <img src="{{$item->product->imgurl}}"
                      class="w-100" alt="Blue Jeans Jacket" />
                    <a href="#!">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                    </a>
                  </div>
                  <!-- Image -->
                </div>

                <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                  <!-- Data -->
                  <p><strong>{{$item->product->name}}</strong></p>
                  <p>Color: blue</p>
                  <p>Size: M</p>
                  <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                    @csrf
                        @method('DELETE')
                        <button class="btn btn-danger px-3 ms-2" type="submit"

                     >Cancel

                        </button>
                    </form>
                  <!-- Data -->
                </div>

                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                  <!-- Quantity -->
                  <div class="d-flex mb-4" style="max-width: 300px">



                    <div class="form-outline">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="rowId" value="{{ $item->id }}">
                            <input id="form{{ $item->id }}" min="0" name="quantity" value="{{ $item->quantity }}" type="number" class="form-control" />
                            <label class="form-label" for="form{{ $item->id }}">Quantity</label>
                            <button class="btn btn-primary px-3 ms-2" type="submit">
                                Update
                            </button>
                        </form>
                    </div>
                    <div class="container">
                        Total:
                        <p class="text-start text-md-center">
                            <strong>Rs{{ $item->product->price * $item->quantity }}</strong>
                          </p>
                          <div class="container">
                            <a name="" id="" class="btn btn-primary" href="#" role="button">Checkout</a>
                         </div>
                    </div>




                </div>
                  <!-- Quantity -->

                  <!-- Price -->

                </div>
              </div>
            </div>
              @endforeach


          <div class="card mb-4">
            <div class="card-body">
              <p><strong>Expected shipping delivery</strong></p>
              <p class="mb-0">12.10.2020 - 14.10.2020</p>
            </div>
          </div>
          <div class="card mb-4 mb-lg-0">
            <div class="card-body">
              <p><strong>We accept</strong></p>
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/visa.svg"
                alt="Visa" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/amex.svg"
                alt="American Express" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce-gateway-stripe/assets/images/mastercard.svg"
                alt="Mastercard" />
              <img class="me-2" width="45px"
                src="https://mdbcdn.b-cdn.net/wp-content/plugins/woocommerce/includes/gateways/paypal/assets/images/paypal.webp"
                alt="PayPal acceptance mark" />
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
@endif
