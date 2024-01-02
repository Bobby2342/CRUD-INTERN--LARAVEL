@include("header")


<div class="container">
@if(count($cartProducts) > 0)
    <h2>Shopping Cart</h2>
    <table>
        <tr><th>Product Image</th>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
        @foreach($cartProducts as $product)
            <tr>
                <td><img src="{{ $product->imgurl }}" style="height: 10ch"  alt="Uploaded Image">
            </td>

                <td>{{ $product->name }}</td>

                <td>Rs {{ $product->price }}</td>
                <td>{{ $cart[$product->id]['quantity'] }}</td>
                <td>
                    <form action="{{route('updateCart',['id'=>$product->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="number" name="quantity" value="{{ $cart[$product->id]['quantity'] }}" min="1">
                        <button type="submit">Update</button>
                    </form>
                </td>
                <td>
                    <form action="{{route('deleteCart', ['id'=>$product->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@else
    <p>Your cart is empty.</p>
@endif
</div>
