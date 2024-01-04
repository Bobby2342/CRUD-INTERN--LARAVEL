@include('header')

@if(isset($products))
    @foreach($products as $product)

    @endforeach
@endif
<h1>No results found</h1>

<div class="pagination">
    {{ $products->links() }}
</div>
