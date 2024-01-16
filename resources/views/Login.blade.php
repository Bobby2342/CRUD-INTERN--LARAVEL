@include('header')
<div class="container">
@if (session('success'))
<div class="mb-4 font-medium text-sm text-green-600">
    {{ session('success') }}
</div>
@endif

</div>
<br>
<div class="container mt-5">

    <form action="{{route('submitLogin')}}" method="post">
        @csrf
        <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="" aria-describedby="helpId">
        </div>

        <button class="btn btn-dark" value="Login" type="submit">Login</button>
        <div class="form-group">

        </div>
        <div class="form-group">
        <a href="">New Member Create Account </a>
        </div>


    </form>

    <form action="" method="post">

        <div class="form-group">
         <a href="{{url ('auth/google')}}"><img src="https://pbs.twimg.com/profile_images/1605297940242669568/q8-vPggS_400x400.jpg" style="width: 30; height:30" alt=""> Sign in with Google</a>
        </a></div>
    </form>



</div>
