<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;

class AdsController extends Controller
{
    public function danhsach() {
        $ads = Ads::all();

        return view('quangcao.danhsach', ['ads' =>$ads]);
    }

    public function luu(Request $request) {
        $name = $request->name;
        $image = $request->file('image')->store('public/anhquangcao');
        $image = str_replace('public', 'storage', $image);
        
        $ads = new Ads();
        $ads->name = $name;
        $ads->image = $image;

        $ads->save();

        return back();
    }
}
