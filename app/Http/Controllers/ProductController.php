<?php

namespace App\Http\Controllers;

use App\Events\ProductCreated;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use GuzzleHttp\Psr7\Query;
use Hamcrest\Core\AllOf;
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
        $comments = $productdetails->comments;

        return view ('pdetails' ,['productdetails'=>$productdetails ,'comments'=>$comments]);
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
        event(new ProductCreated($product));
        return redirect()->route('viewProduct')->with('success', 'Product added successfully!');

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
    $product->category_id = $validatedData['category'];


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
public function fetchCat($categoryid){  //category fetched in divisions

    $category = Category::findorFail($categoryid);


    $data = [

          'category' => $category,

    ];

    return view('Cat', $data);
}


public function Checkout()  {


    return view('Checkout');

}







};

