
<!------ Include the above in your HEAD tag ---------->
<!doctype html>
<html lang="en">
  <head>
    <title>My shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/slider.css">
    <link rel="stylesheet" type="text/css" href="/css/pdetails.css">
    <link rel="stylesheet" type="text/css" href="/css/welcome.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <a href="/" class="navbar-brand">My Shop</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a href="{{route('showCategory')}}" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach ($categories as $cat )

                        <a class="dropdown-item" href="{{ route('fetchCat', ['categoryid' => $cat->id]) }}">{{ $cat->displayname }}</a>

                        @endforeach




                    </div>
                </li>
                <a href="/product" class="nav item active nav-link">Products</a>
                <a href="/cart" class="nav-item active nav-link"> View Cart</a>
                <a href="/upload" class="nav item active nav-link">Sell Products</a>
                <a href="/category" class="nav item active nav-link">Create Category</a>
                <a href="/contact" class="nav item active nav-link">Contact Us</a>


                <a href="#" class="nav-item active nav-link"> </a>




            </ul>
            @guest
            <a href="/login" class="nav-item active nav-link">Login </a>
            <a href="/signup" class="nav-item active nav-link"> Signup</a>
            @else
            <i  style="color: white" aria-hidden="true"><b>{{Auth::user()->name}}</b></i>

            <a href="{{route('logout')}}" class="nav-item active nav-link"> Logout</a>
            @endguest
            <form action="{{route ('searchProduct')}}" method="get" class="form-inline my-2 mylg-0">
                <input type="search" name="query" id="" class="form-control mr-sm-2" placeholder="  search here  " aria-label="">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </body>
    </html>
