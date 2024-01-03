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
