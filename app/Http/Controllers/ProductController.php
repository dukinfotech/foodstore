<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;

class ProductController extends Controller
{
    public function danhsach() {
        $products = Product::with('supplier')->get();
        return view('sanpham/danhsach', ['products' => $products]);
    }


    public function tao() {
        $suppliers = Supplier::all();
        return view('sanpham.tao', ['suppliers' => $suppliers]);
    }

    public function luu(Request $request) {
        $name = $request->name;
        $quantity = $request->quantity;
        $unit = $request->unit;
        $image = $request->file('image')->store('public/anhsanpham');
        $image = str_replace('public', 'storage', $image);
        $price = $request->price;
        $description = $request->description;

        if ($quantity < 0 || $price < 0) {
            return back();
        }

        $product = new Product();
        $product->name = $name;
        $product->quantity = $quantity;
        $product->unit = $unit;
        $product->image = $image;
        $product->price = $price;
        $product->description = $description;

        $supplier =  Supplier::find($request->supplier_id);
        if (! $supplier) {
            abort(404);
        }

        $supplier->products()->save($product);

        return redirect('/admin/sanpham/danhsach');
    }

    public function sua($id) {
        $suppliers = Supplier::all();
        $product = Product::find($id);
        if ($product) {
            return view('sanpham.sua', ['product' => $product, 'suppliers' => $suppliers]);
        }

        abort(404);
    }

    public function capnhat(Request $request, $id) {
        $name = $request->name;
        $quantity = $request->quantity;
        $unit = $request->unit;
        $image = null;
        if ($request->file('image')) {
            $image = $request->file('image')->store('public/anhsanpham');
            $image = str_replace('public', 'storage', $image);
        }
        $price = $request->price;
        $description = $request->description;

        if ($quantity < 0 || $price < 0) {
            return back();
        }

        $product = Product::find($id);
        if (! $product) {
            abort(404);
        }
        $product->name = $name;
        $product->quantity = $quantity;
        $product->unit = $unit;
        if ($image) {
            $product->image = $image;
        }
        $product->price = $price;
        $product->description = $description;

        $supplier =  Supplier::find($request->supplier_id);
        if (! $supplier) {
            abort(404);
        }

        $supplier->products()->save($product);

        return redirect('/admin/sanpham/danhsach');
    }

    public function xoa($id) {
        Product::destroy($id);
        return redirect('admin/sanpham/danhsach');
    }
}
