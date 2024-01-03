<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function showMobileProducts()
    {
        $mobileProducts = Product::where('category', 'Mobile')->get();

        return view('/mobiles', compact('mobileProducts'));
    }
    public function showMusicProducts()
    {
        $musicProducts = Product::where('category', 'MusicInstrument')->get();

        return view('/music', compact('musicProducts'));
    }
    public function showLaptopProducts()
    {
        $laptopProducts = Product::where('category', 'Laptop')->get();

        return view('/laptop', compact('laptopProducts'));
    }
    public function showFashionProducts()
    {
        $fashionProducts = Product::where('category', 'fashions')->get();

        return view('/fashion', compact('fashionProducts'));
    }
}

