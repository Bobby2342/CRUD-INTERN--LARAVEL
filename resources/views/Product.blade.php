
@include('header')

<div class="container mt-5">
    @if(session('success'))
    <div class="alert alert-success">
       <h1>{{ session('success') }}</h1>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<b>Latest Products</b>
<br>


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
                    @if(Auth::check())

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
                @endif
                <div class="product-content" style="align-content:center" >
                    <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                    <div class="price">
                     Rs {{$product->price}}
                        <span>$16.00</span>
                    </div>
                    <form action="{{route('addToCart',['id' => $product->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </form>
                </div>
            </div>
        </div>

<hr>
    </div>      @endforeach
</div>



<div class="container">
<div class="pagination">
    {{ $products->links() }}
</div>
</div>


