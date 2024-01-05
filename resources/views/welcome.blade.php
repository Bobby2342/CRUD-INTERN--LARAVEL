@include('header')

    <div class="container ">

         <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">

        @foreach ($slideproducts as $product)
             <div class="carousel-inner">

                 <div class="carousel-item active">
                         <div class="mask flex-center">


                             <div class="row align-items-center">
                             <div class="col-md-7 col-12 order-md-1 order-2">
                                 <h4> {{$product->category}} <br>
                                 </h4>
                                 <b>{{$product->name}}</b>
                                 <p>{{$product->description}}</p>
                                 <a href="#">Offer</a> </div>
                             <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{$product->imgurl}}" class="mx-auto" alt="slide"></div>
                             </div>

                         </div>

                 </div>

             </div>
             @endforeach

            </div>


    </div>


<br>
<br>
    <div class="container ">
        <h3 class="h3">Recent Products </h3>
        <div class="row">

            @foreach ($recentproducts as $product)

            <div class="col-md-3 col-sm-6">
                <div class="product-grid4">
                    <div class="product-image4" style="max-inline-size: 600pt">
                        <a href="{{route('productDetails', ['id'=> $product->id])}}">
                            <img class="pic-1" src="{{$product->imgurl}}">
                            <img class="pic-2" src="{{$product->image}}">
                        </a>
                        <ul class="social">
                            <li><a href="{{route('productDetails',['id'=> $product->id])}}" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                            <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                            <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                        <span class="product-discount-label">-10%</span>
                    </div>
                    <div class="product-content" style="align-content:center" >
                        <h3 class="title"><a href="#">{{$product->name}}</a></h3>
                        <div class="price">
                          {{$product->price}}
                            <span>$16.00</span>
                        </div>
                        <form action="{{route('addToCart')}}" method="POST">
                            @csrf
                             <a class="add-to-cart" name="product_id" value="{{$product->id}}" type="submit" href="">ADD TO CART</a>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <hr>

</div>
