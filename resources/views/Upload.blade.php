@include('header')
    <div class="container">
        <h1>Sell Products</h1>
    </div>
    <form action="{{route('submitForm')}}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="container">
        <div class="form-group">
          <label for="">Product Name:</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
          <small id="helpId" class="text-muted">Help text</small>
        </div>

        <div class="form-group">
            <label for="">Product Image:</label>
            <input type="file" name="image" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Image Url:</label>
            <input type="text" name="imgurl" id="" class="form-control"  placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Description:</label>
            <input type="text" name="description" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <label for="">Product Price:</label>
            <input type="text" name="price" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small id="helpId" class="text-muted">Help text</small>
          </div>

          <div class="form-group">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    Categories
                </button>
                <div class="dropdown-menu" aria-labelledby="triggerId">
                    @foreach ($categories as $drop)
                        <a class="dropdown-item" href="#" onclick="selectCategory(event, '{{ $drop->id }}', '{{ $drop->displayname }}')">{{ $drop->displayname }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Hidden input to store the selected category -->
        <input name="selected_category" id="selected_category" type="hidden">

        <input name="upload_button" id="upload-button" class="btn btn-primary" type="submit" value="Upload">
    </div>
    </form>

  </body>
</html>

<script>
 function selectCategory(event, categoryId, categoryName) {
        event.preventDefault(); // Prevents the default link behavior
        document.getElementById('selected_category').value = categoryId;
        document.getElementById('triggerId').innerText = categoryName;
    }
</script>
