<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <a href="/product" class="navbar-brand">Home</a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <a href="#" class="nav-item active nav-link"> </a>
                <a href="/cart" class="nav-item active nav-link"> View Cart</a>
                <a href="/upload" class="nav item active nav-link">Sell Products</a>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle active" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a href="#" class="dropdown-item"></a>
                        <a href="#" class="dropdown-item"> </a>
                        <a href="#" class="dropdown-item">     </a>
                    </div>
                </li>
            </ul>

            <form action="{{route ('searchProduct')}}" method="get" class="form-inline my-2 mylg-0">
                <input type="search" name="query" id="" class="form-control mr-sm-2" placeholder="  search here  " aria-label="">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </nav>
