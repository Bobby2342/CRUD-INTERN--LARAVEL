@include('header')

<div class="container mt-4">



<div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">



      <div class="carousel-item active">
            <div class="mask flex-center">
                @foreach ($slideproducts as $product)
            <div class="container">
                <div class="row align-items-center">
                <div class="col-md-7 col-12 order-md-1 order-2">
                    <h4> {{$product->category}} <br>
                    </h4>
                    <b>{{$product->name}}</b>
                    <p>{{$product->description}}</p>
                    <a href="#">Offer</a> </div>
                <div class="col-md-5 col-12 order-md-2 order-1"><img src="{{$product->imgurl}}" class="mx-auto" alt="slide"></div>
                </div>@endforeach

            </div>
            </div>
      </div>

    </div>
  <!--slide end-->

</div>


</div>

<div class="container">


</div>
