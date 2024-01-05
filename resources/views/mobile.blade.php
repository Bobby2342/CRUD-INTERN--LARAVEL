@include('header')

<div class="container">
<b>Mobile Products</b>
<br>
    @foreach($mobileProducts as $product)
    <div class="card" style="width: 18rem; float: left; margin:10px;padding: 10px 3px; height:600px ">
        <img class="card-img-top" src="{{$product->imgurl}}" style="width:200; height:300;" alt="Image here">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p><b>Price: ${{ $product->price }}</b></p>
            <form action="{{ route('addToCart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-primary">Add to cart</button>
            </form>

                <form action="{{ route('editProductForm', ['id' => $product->id]) }}" method="GET">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Edit
                    </button>
                </form>


                <form action="{{ route('deleteProduct', ['id' => $product->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete Product</button>
                </form>


        </div>
    </div>
@endforeach

</div>
@include('header')


<div class="container">
    @if($mobileProducts->count() > 0)

    <div class="container">
        <h3 class="h3">Recent Products </h3>
        <div class="row">

            @foreach ($mobileProducts as $product)

            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4">
                        <a href="#">
                            <img class="pic-1" src="{{$product->imgurl}}">
                            <img class="pic-2" src="{{$product->image}}">
                        </a>
                        <ul class="social">
                            <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                        <span class="product-discount-label">-10%</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                        <div class="price">
                          {{$product->price}}
                            <span>$16.00</span>
                        </div>
                        <form action="{{route('addToCart')}}" method="POST">
                            @csrf
                             <a class="add-to-cart" name="product_id" value="" href="">ADD TO CART</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @else

        <p>No mobile products found</p>

        @endif
    </div>
    <hr>

</div>







</div>
