<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<!------ Include the above in your HEAD tag ---------->
<!doctype html>
<html lang="en">
  <head>
    <title>My shop</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
<nav class="navbar navbar-expand navbar-dark bg-dark">
        <a href="/" class="navbar-brand">Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a href="#" class="nav-item active nav-link"> </a>
                <a href="/cart" class="nav-item active nav-link"> View Cart</a>
                <a href="/upload" class="nav item active nav-link">Sell Products</a>
                <a href="/product" class="nav item active nav-link">Products</a>


                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="{{route('mobiles')}}" class="dropdown-item">Mobile Phones</a>
                        <a href="#" class="dropdown-item"> Laptop and Acessories</a>
                        <a href="#" class="dropdown-item"> Fashions and Wearings  </a>
                        <a href="{{route('music')}}" class="dropdown-item"> Music and Instrumnents  </a>

                    </div>
                </li>
            </ul>
            @guest
            <a href="/login" class="nav-item active nav-link">Login </a>
            <a href="/signup" class="nav-item active nav-link"> Signup</a>
            @else
            <i class="fa fa-bold" style="color: white" aria-hidden="true">{{Auth::user()->name}}</i>

            <a href="{{route('logout')}}" class="nav-item active nav-link"> Logout</a>
            @endguest
            <form action="{{route ('searchProduct')}}" method="get" class="form-inline my-2 mylg-0">
                <input type="search" name="query" id="" class="form-control mr-sm-2" placeholder="  search here  " aria-label="">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
