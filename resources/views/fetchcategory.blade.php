@include('header')

<!-- your_view.blade.php -->
<div>
@foreach($productcategories as $product)
    <div>
        <p>Product Name: {{ $product->name }}</p>
        <p>Category ID: {{ $product->category_id }}</p>
    </div>
    <!-- Other HTML structure or styling for each product -->
@endforeach

</div>
