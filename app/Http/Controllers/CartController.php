<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function viewCart()
    {
        // Retrieve cart items from the database
        $cartItems = Cart::with('product')->get(); // Assuming 'product' is the relationship to the product model

        return view('cart', compact('cartItems'));
    }

public function addToCart($productId)
{
    // Retrieve the product from the database based on $productId
    $product = Product::find($productId);

    if (!$product) {
        abort(404); // Product not found
    }

    // Check if the product already exists in the cart
    $existingCartItem = Cart::where('product_id', $product->id)->first();

    if ($existingCartItem) {
        // If the product is already in the cart, increment the quantity
        $existingCartItem->update([
            'quantity' => $existingCartItem->quantity + 1,
        ]);
    } else {
        // If the product is not in the cart, create a new entry
        Cart::create([
            'product_id' => $product->id,
            'quantity' => 1, // Set the quantity as needed
        ]);
    }

    return redirect()->back()->with('success', 'Product added to cart successfully!');
}

public function updateCart(Request $request)
{
    $cartItemId = $request->input('rowId');
    $quantity = $request->input('quantity');

    // Find the cart item by ID
    $cartItem = Cart::find($cartItemId);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    // Update the quantity for the cart item
    $cartItem->update([
        'quantity' => $quantity,
    ]);

    return redirect()->back()->with('success', 'Cart updated successfully.');
}

// ... (other methods)
public function removeFromCart($cartItemId)
{
    // Find the cart item by ID
    $cartItem = Cart::find($cartItemId);

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item not found in cart.');
    }

    // Delete the cart item
    $cartItem->delete();

    return redirect()->back()->with('success', 'Item removed from cart.');
}


}
