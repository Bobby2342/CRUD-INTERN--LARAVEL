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

                    <div class="action">
                        <form action="{{route('addToCart')}}" method="post">
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
