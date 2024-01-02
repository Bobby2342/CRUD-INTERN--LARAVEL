
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
    @foreach($products as $product)
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


<div>
    <br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
