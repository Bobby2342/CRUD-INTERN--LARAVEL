
@include('header')

<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
       <h1>{{ session('Product is Out of Stock') }}</h1>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('Product is Still Available ') }}
    </div>
@endif
<b>Latest Products</b>
<br>

    {{-- <div class="card" style="width: 18rem; float: left; margin:10px;padding: 10px 3px; height:600px ">
        <img class="card-img-top" src="{{$product->imgurl}}" style="width:200; height:300;" alt="Image here">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <p class="card-text">{{ $product->category }}</p>

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

                <a name="" id="" class="btn btn-primary" href="/pdetails" role="button">View Product</a>


        </div>

</div> --}}
<div class="container ">
    <h3 class="h3">Recent Products </h3>
    <div class="row">


        @foreach($products as $product)
        <div class="col-md-3 col-sm-6">
            <div class="product-grid4">
                <div class="product-image4" style="max-inline-size: 600pt">
                    <a href="{{route('productDetails', ['id'=> $product->id])}}">
                        <img class="pic-1" src="{{$product->imgurl}}">
                        <img class="pic-2" src="{{$product->image}}">
                    </a>
                    <ul class="social">
                        <li><a href="{{route('productDetails',['id'=> $product->id])}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                       <li><form action="{{ route('editProductForm', ['id' => $product->id]) }}" method="GET">
                        @csrf

                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Edit
                        </button>
                    </form></i></a></li>


                        <li><a><form action="{{ route('deleteProduct', ['id' => $product->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                     <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary">Delete
                    </button>
                </form></i></a></li></form></li>
                    </ul>
                    <span class="product-new-label">New</span>
                    <span class="product-discount-label">-10%</span>
                </div>
                <div class="product-content" style="align-content:center" >
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <div class="price">
                     Rs {{$product->price}}
                        <span>$16.00</span>
                    </div>
                    <form action="{{ route('addToCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
<hr>
    </div>
</div>



<div class="container">
<div class="pagination">
    {{ $products->links() }}
</div>
</div>


