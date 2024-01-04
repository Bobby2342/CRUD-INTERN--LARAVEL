@include('header')

<div class="container">
    <form action="{{ route('updateCategory', ['id' => $category->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
<div class="form-group">
  <label for="">Category Name</label>
  <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
  <small id="helpId" class="text-muted">Help text</small>
</div>


<div class="form-group">
  <label for="">Category Image</label>
  <input type="file" class="form-control-file" name="image" id="" placeholder="" aria-describedby="fileHelpId">
  <small id="fileHelpId" class="form-text text-muted">Help text</small>
</div>
  <div class="form-group">
    <label for="">DisplayName</label>
    <input type="text" name="displayname" id="" class="form-control" placeholder="" aria-describedby="helpId">
    <small id="helpId" class="text-muted">Help text</small>
  </div>
    <input name="" id="" class="btn btn-primary" type="submit" value="update CATEGORY">

</div>
</form>
