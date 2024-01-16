@include('header')

<div class="container mt-5">
    @if (session('success'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('success') }}
        </div>
    @endif
    @if (session('failed'))
        <div class="mb-4 font-medium text-sm text-red-600">
            {{ session('failed') }}
        </div>
    @endif

    @if ($errors->any())

    <div class="alert alert-danger">

        <li>{{$errors}}</li>
    </div>

    @endif
    {{-- @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}


    <form action="{{ route('submitSignup') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter username" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" aria-describedby="helpId">
        </div>

        <div class="form-group">
            <label for="confirmPassword">Confirm Password</label>
            <input type="password" name="confirmpassword" id="confirmPassword" class="form-control" placeholder="Confirm password" aria-describedby="helpId">
        </div>

        <input class="btn btn-dark" type="submit" value="Sign Up">

        <div class="form-group">
            <a href="{{ route('login') }}">Already a member? Login</a>
        </div>
    </form>
    <form action="" method="post">

        <div class="form-group">
         <a href="{{url ('auth/google')}}"><img src="https://pbs.twimg.com/profile_images/1605297940242669568/q8-vPggS_400x400.jpg" style="width: 30; height:30" alt=""> <a href="">Signup with Google</a>
        </div></a>
    </form>
</div>
