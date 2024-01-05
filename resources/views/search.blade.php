@include('header')

<div class="pagination">
    @if(isset($products))
    @foreach($products as $product)

    @endforeach
@endif
<h1>No results found</h1>
    {{ $products->links() }}
</div>
