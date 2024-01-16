@include('header')





@if ($productdetails)


<div class="container">
    <div class="card">
        <div class="container-fliud">
            <div class="wrapper row">
                <div class="preview col-md-6">

                    <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"><img src="{{$productdetails->imgurl}}" /></div>

                    </div>


                </div>
                <div class="details col-md-6">
                    <h3 class="product-title"></h3>
                    <div class="rating">
                        <div class="stars">
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <span class="fa fa-star"></span>
                        </div>
                        <h4 class="name">{{$productdetails->name}}</h4>

                    </div>
                    <p class="product-description">{{$productdetails->description}}</p>
                    <h4 class="price">current price: <span>Rs{{$productdetails->price}}</span></h4>
                    <p class="vote"><strong>91%</strong> of buyers enjoyed this product! <strong>(87 votes)</strong></p>
                    <h5 class="sizes">sizes:
                        <span class="size" data-toggle="tooltip" title="small">s</span>
                        <span class="size" data-toggle="tooltip" title="medium">m</span>
                        <span class="size" data-toggle="tooltip" title="large">l</span>
                        <span class="size" data-toggle="tooltip" title="xtra large">xl</span>
                    </h5>
                    <h5 class="colors">colors:
                        <span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
                        <span class="color green"></span>
                        <span class="color blue"></span>
                    </h5>
                    <div class="container">
                        <b>Sold By: </b></b><p> seller name</p>
                            <form action="{{route('sendMessage')}}" method="post">

                            <label class="chat-btn" >
                                    <div class="header"> <b>Contact Seller</b> </div>
                                    <div class="text-center p-2"> <span>Please fill out the form to start chat!</span> </div>
                                    <div class="chat-form">
                                        <input type="text" class="form-control" placeholder="Name" name="name">
                                        <input type="text" class="form-control" placeholder="Email" name="email">
                                        <textarea class="form-control" placeholder="Your Text Message" name="messages"></textarea>
                                        <button class="btn btn-success btn-block" type="submit">Message</button> </div>
                             </form>
                    </div>
                    <br>

                    <div class="action">
                        <form action="{{route('addToCart',['id' => $productdetails->id])}}" method="post">
                            @csrf
                        <button class="add-to-cart btn btn-dark" name="product_id" value="{{$productdetails->id}}" type="submit">add to cart</button>
                        <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





  @else
  <p>product details not found</p>
  @endif


  <section style="background-color: #f8f1f1;">
    <div class="container">

      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
            <header>Review and Comments</header>
          <div class="card">


            @foreach ($comments as $comment)
            <div class="card-body">
              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="" alt="avatar" width="60"
                  height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">by {{ $comment->user->name }}</h6>
                  <p class="text-muted small mb-0">
                  {{$comment->created_at}}
                  </p>
                </div>
              </div>

              <p class="mt-3 mb-4 pb-2">

               {{ $comment->comment_body }}

              </p>
              <img class=""
              src="{{ asset('storage/'. $comment->image) }}" alt="avatar" width="240"
              height="200" />

              <div class="small d-flex justify-content-start">
                <a href="#!" class="d-flex align-items-center me-3">
                  <p class="mb-0">Like</p>
                </a>

                </a>
                <a href="#!" class="d-flex align-items-center me-3">

             <form action="/" method="">
                <button type="submit"> Reply</button>
             </form>
                </a>
              </div>



            </div>

            @endforeach
          </div>


            <form action="{{route('commentSubmit')}}" method="post" enctype="multipart/form-data">
                @csrf

            <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
              <div class="d-flex flex-start w-100">
                <img class="rounded-circle shadow-1-strong me-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                  height="40" />
                <div class="form-outline w-100">
                  <textarea  name="comment_body" class="form-control" id="textAreaExample" rows="4"
                    style="background: #fff;"></textarea>
                    <input type="hidden" name="product_id" value="{{$productdetails->id}}" />

                  <label class="form-label" for="textAreaExample">Message</label>
                  <div class="mb-3">
                    <label for="" class="form-label">Upload Image</label>
                    <input
                        type="file"
                        class="form-control"
                        name="image"
                        id=""
                        placeholder="upload image here"
                        aria-describedby="fileHelpId"
                    />

                  </div>

                </div>
              </div>
              <div class="float-end mt-2 pt-1">
                <input type="submit" class="btn btn-success" value="Add Comment" />
                <button type="submit" class="btn btn-outline-primary btn-sm">Cancel</button>
              </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </section>
