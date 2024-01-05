<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{



    //create crud of categories
    public function viewCategory(){
        return view('Category');
    }
    public function createCategory(Request $request){

    $validateData = $request -> validate([
        'name'=> 'required',
        'image' => 'required',
        'displayname' => 'required'


    ]);
    $imagePath = $request->file('image')->store('images', 'public');

    $category = Category::create([
        'name' => $validateData['name'],
        'image' => 'storage/'.$imagePath,
        'displayname' => $validateData['displayname'],]);
        return redirect()->route('fetchCategory')->with('success', 'Form submitted successfully!');



}

    public function fetchCategory()  {

        $categories = Category::all();

        return view('CategoryView' , compact('categories'));

    }

    public function viewedit($id)
    {           $category = Category::findorFail($id);

        return view('EditCategory', ['category'=> $category]);
    }


    public function updateCategory(Request $request, $id)
{     $category = Category::find($id);

    $validateData = $request->validate([
        'name' => 'required',
        'image' => 'required',
        'displayname' => 'required',
    ]);

    $imagePath = $request->file('image')->store('images', 'public');

    $category->update([
        'name' => $validateData['name'],
        'image' => 'storage/' . $imagePath,
        'displayname' => $validateData['displayname'],
    ]);

    return redirect()->route('fetchCategory', ['id'=> $category->id])->with('success', 'Category updated successfully!');
}
public function delCategory($id)
{   $category = Category::find($id);

    $category->delete();

    return redirect()->route('fetchCategory')->with('success', 'Category deleted successfully!');
}

    public function showCategory(){

        $categories= Category::all();

        return view('header',  ['categories'=> $categories]);
    }

    public function dropdown(){

        $categories=Category::all();

        return view('Upload',['categories'=> $categories]);
    }
    public function dropdownEdit(){

        $editdropdown=Category::all();

        return view('EditProduct',['editdropdown'=> $editdropdown]);
    }



}
