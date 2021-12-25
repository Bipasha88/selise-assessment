<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list(){
        $products = Product::all();
        return view('welcome',compact('products'));
    }

    public function detail($id){
        $product = Product::find($id);
        return view('productDetails',compact('product'));
    }

}
