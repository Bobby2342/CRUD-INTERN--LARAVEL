<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Psr7\Query;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductController extends Controller


{

//here is slide product and recent both variables
    public function slideProduct(){
        $slideproducts = Product::paginate(2);
        $recentproducts = Product::orderBy('created_at', 'desc')->take(4)->get();
        $data=[

            'slideproducts'=> $slideproducts,
            'recentproducts'=>$recentproducts,
        ];

        return view('welcome', $data);
    }


    public function viewProduct(){

        $products = Product::paginate(5);
        $data = [
            'products'=> $products,
        ];

        return view('Product',$data);
    }

    public function productDetails($id){
        $productdetails = Product::findorFail($id);

        return view ('pdetails' ,['productdetails'=>$productdetails]);
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
            'selected_category'=> 'required',
            'imgurl'=>'nullable',



        ]);

        $imagePath = $request->file('image')->store('images', 'public');
        $selectedCategory = $request->input('selected_category');


        $product = Product::create([
            'name' => $validatedData['name'],
            'image' => 'storage/'.$imagePath,
            'description' => $validatedData['description'],
            'price' => $validatedData['price'],
            'category_id' => $validatedData['selected_category'],
            'imgurl'=>$validatedData['imgurl']
        ]);
        return redirect()->route('viewProduct')->with('success', 'Form submitted successfully!');

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

    return redirect()->route('viewCart')->with('success', 'Product added to cart!');
}
public function totalCart(Request $request , $id){


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
        'category'=>'nullable'
    ]);
    $product->name = $validatedData['name'];
    $product->description = $validatedData['description'];
    $product->image = $validatedData['image'];
    $product->imgurl = $validatedData['imgurl'];
    $product->price = $validatedData['price'];
    $product->category = $validatedData['category'];


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

public function searchProduct(Request $request)
{
    $query = $request->input('query');

    $products = Product::where('name', 'like', '%' . $query . '%')
                        ->orWhere('description', 'like', '%' . $query . '%')
                        ->orWhere('price', 'like', '%' . $query . '%')
                        ->paginate(4); // Pagination should be called here

    return view('product', compact('products'));
}


public function category()  {

    return $this->belongsTo(Category::class, 'category_id');

}

public function fetchProduct(){

    $productcategories= Product::with('category')->get();

    foreach ($productcategories as $product) {
        $productName = $product->name;
        $categoryName = $product->category->name; // Accessing category name
        // Other operations or data manipulation...
    }

    return view('your_view', ['productcategories' => $productcategories]);
}

}
