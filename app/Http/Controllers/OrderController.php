<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function list(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('orderList',compact('orders'));
    }
}
