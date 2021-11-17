<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function danhsach() {
        $suppliers = Supplier::all();
        return view('nhacungcap/danhsach', ['suppliers' => $suppliers]);
    }

    public function tao() {
        return view('nhacungcap/tao');
    }

    public function luu(Request $request) {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        
        $supplier = new Supplier();
        $supplier->name = $name;
        $supplier->address = $address;
        $supplier->phone = $phone;
        $supplier->email = $email;

        $supplier->save();
        
        return redirect('admin/nhacungcap/danhsach');
    }

    public function sua($id) {
        $supplier = Supplier::find($id);
        if ($supplier) {
            return view('nhacungcap.sua', ['supplier' => $supplier]);
        }

        abort(404);
    }

    public function capnhat(Request $request, $id) {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $email = $request->email;
        
        $supplier = Supplier::find($id);
        if ($supplier) { 
            $supplier->name = $name;
            $supplier->address = $address;
            $supplier->phone = $phone;
            $supplier->email = $email;

            $supplier->save();
            
            return redirect('admin/nhacungcap/danhsach');
        }

        abort(404);
    }

    public function xoa($id) {
        Supplier::destroy($id);
        return redirect('admin/nhacungcap/danhsach');
    }
}
