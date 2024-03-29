@include('header')

    <h1>Edit Product</h1>
    <form action="{{ route('editProduct', ['id' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
    <div class="container">
        <div class="form-group">
          <label for="">Product Name:</label>
          <input type="text" name="name" id="" value="{{$product->name}}" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Change Value</small>
        </div>

        <div class="form-group">
            <label for="">Product Image:</label>
            <input type="file" name="image" id="" value="{{$product->image}}" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Image Url:</label>
            <input type="text" name="imgurl" id="" value="{{$product->imgurl}}" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Description:</label>
            <input type="text" name="description" value="{{$product->description}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Price:</label>
            <input type="text" name="price" id="" value="{{$product->price}}" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>
          <div class="form-group">
            <label for="">Product Categories:</label>
            <input type="text" name="category" id="" value="{{$product->category}}" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>
          <input name="" id="" class="btn btn-primary" type="submit" value="Update">

    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



</body>
</html>
