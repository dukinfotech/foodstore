<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class SanphamController extends Controller
{
    public function themvaogiohang($id, Request $request) {
        $product = Product::find($id);
        $product->soluong = 1;
        $giohang = null;
        $datontaisanpham = false;
        if ($request->session()->has('giohang')) {
            $giohang = $request->session()->get('giohang');
            foreach ($giohang as $key => $sanphamtronggiohang) {
                if ($sanphamtronggiohang->id === $product->id) {
                    // Cong don so luong cua san pham da ton tai trong gio hang
                    $datontaisanpham = true;
                    $sanphamtronggiohang->soluong = $sanphamtronggiohang->soluong + 1;
                }
            }
            if (! $datontaisanpham) {

                array_push($giohang, $product);
            }
        } else {
            $giohang = [$product];
        }

        $request->session()->put('giohang', $giohang);
        // $request->session()->forget('giohang', $giohang);
        
        return back();
    }
    // Cho mang x = ['a',  'c' ] 

    public function giamsoluong($id, Request $request) {
        // lay gio hang tu session kiem tra session co/ko 
        // 2 truong hop xoa thi tru 1 , = 1 thi xoa khoi gio hang
        if ($request->session()->has('giohang')) {
            $giohang = $request->session()->get('giohang');
            

            for ($i=0; $i < count($giohang); $i++) {
                if ($giohang[$i]->id == $id ) {
                    if ($giohang[$i]->soluong > 1) {
                        $giohang[$i]->soluong = $giohang[$i]->soluong -1;
                    } else {
                        unset($giohang[$i]);
                        $giohang = array_values($giohang);
                    }
                    break;
                }
            }
            $request->session()->put('giohang', $giohang);
        }
        
        return back();
    }

    public function xoagiohang($id, Request $request) {
        if ($request->session()->has('giohang')) {
            $giohang = $request->session()->get('giohang');
            

            for ($i=0; $i < count($giohang); $i++) {
                if ($giohang[$i]->id == $id ) {
                    unset($giohang[$i]);
                    $giohang = array_values($giohang);
                    break;
                }
            }
            $request->session()->put('giohang', $giohang);
        }
        
        return back();
    }

   
}