<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function thongke() {
        return view('page/thongke');
    }

    public function trangchu(Request $request) {
        // Neu trong bo nho session co bien 'giohang' thi lay va gan vao $giohang, nguoc lai thi $giohang = [];
        if($request->session()->has('giohang')){
            $giohang = $request->session()->get('giohang');
        }
        else{
            $giohang = [];
        }
        $products = Product::all();

        return view('page/trangchu', ['products' => $products, 'giohang' => $giohang]);
    }
}
