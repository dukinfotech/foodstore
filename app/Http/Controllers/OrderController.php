<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function danhsach() {
        $orders = Order::with('products')->get();
        
        return view('donhang.danhsach', ['orders' => $orders]);
    }
}
