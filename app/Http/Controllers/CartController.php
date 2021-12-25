<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart($id){
        $product =Product::findOrFail($id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 0,
            'options' => ['img' => $product->image_url]
        ]);
        return redirect()->route('viewCart');
    }

    public function viewCart(){
        $products = Cart::content();
        return view("cart",compact('products'));
    }

    public function checkout(){
        $products = Cart::content();
        $order = Order::create([
            'user_id' => Auth::id()
        ]);

        foreach ($products as $product)
            $order->products()->attach($product->id);

        Cart::destroy();
        return redirect()->route('orderList');
    }
}
