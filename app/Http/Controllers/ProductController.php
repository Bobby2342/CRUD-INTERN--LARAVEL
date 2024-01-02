<?php

namespace App\Http\Controllers;

use App\Models\Product;
use GuzzleHttp\Psr7\Query;
use Illuminate\Http\Request;

class ProductController extends Controller


{



    public function viewProduct(){

        $products = Product::all();

        return view('Product',['products'=> $products]);
    }


    public function showForm(){

        return view('upload');
    }

    public function submitForm(Request $request){

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust image
            'description' => 'required|string',
            'price' => 'required|numeric',
            'imgurl'=>'required|string',



        ]);

        $imagePath = $request->file('image')->store('images', 'public');


        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => $imagePath,
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'imgurl'=>$validatedData['imgurl']
        ]);
        return redirect()->back()->with('success', 'Form submitted successfully!');

    }

    public function viewCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);

        $cartProducts = Product::whereIn('id', array_keys($cart))->get();

        return view('cart', ['cartProducts' => $cartProducts, 'cart' => $cart]);
    }


    public function addToCart(Request $request)
{
    $productId = $request->input('product_id');

    $product = Product::find($productId);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }

    if (!$request->session()->has('cart')) {
        $request->session()->put('cart', []);
    }

    $cart = $request->session()->get('cart');

    if (array_key_exists($productId, $cart)) {
        $cart[$productId]['quantity']++;
    } else {
        $cart[$productId] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
    }

    $request->session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
}


public function update(Request $request, $id)
{
    $quantity = $request->input('quantity');

    $cart = $request->session()->get('cart', []);

    if (array_key_exists($id, $cart)) {
        $cart[$id]['quantity'] = $quantity;
    }

    $request->session()->put('cart', $cart);

    return redirect()->route('viewCart')->with('success', 'Cart updated!');
}

public function delete(Request $request ,$id)
{
    {
        $cart = $request->session()->get('cart', []);

        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
        }

        $request->session()->put('cart', $cart);

        return redirect()->route('viewCart')->with('success', 'Product removed from cart!');
    }


}

public function editProductForm($id)

{
    $product = Product::findOrFail($id);

    return view('editProduct', compact('product'));
}


public function editProduct(Request $request, $id){
    $product = Product::find($id);


    $validatedData = $request->validate([
        'name' => 'required',
        'description' => 'nullable',
        'image' => 'nullable',
        'imgurl' => 'nullable',
        'price' => 'nullable',
    ]);
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->image = $validatedData['image'];
    $product->imgurl = $validatedData['imgurl'];
    $product->price = $validatedData['price'];

    $product->save();

    return redirect()->route('viewProduct', ['id' => $product->id])->with('success', 'Product updated successfully');


}
public function deleteProduct( $id){
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('viewProduct')->with('error', 'Product not found');
        }

        $product->delete();

        return redirect()->route('viewProduct')->with('success', 'Product removed from the stock');
    }
}

public function searchProduct(Request $request){

    $query = $request->input('query');//query is a search aspects in the search box

    $products = Product::where('name','like',$query."%" )
                        ->orWhere('description','like',$query."%")
                        ->orWhere('price','like',$query."%" )
                        ->get();
    return view('product', compact('products'));
}

}
