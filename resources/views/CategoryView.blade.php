@include('header');
@foreach ($categories as $category)
<div class="container " style="float: center">




    <div class="card-columns" >


        <div class="card  ">
            <img class="card-img-top" src="{{$category->image}}" alt="">
            <div class="card-body" style="">
                <h4 class="card-title">{{$category->displayname}}</h4>
                <p class="card-text">Category name: <b>{{$category->name}}</b></p>
                <a name="" id="" class="btn btn-primary" href="{{route('viewedit', ['id'=> $category->id])}}" role="button">Edit</a>
                <form action="{{ route('delCategory', ['id' => $category->id])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete </button>
                </form>
            </div>
        </div>

    </div>

</div>
@endforeach
