<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller {
    public function danhsach() {
        $posts = Post::all();

        return view('news/danhsach', ['posts'=>$posts]);
    }

    public function tao() {
        $posts = Post::all();
        return view('news.tao', ['posts' => $posts]);
    }

    public function luu(Request $request) {
        $title = $request->title;
        $image = $request->file('image')->store('public/anhbaiviet');
        $image = str_replace('public', 'storage', $image);
        $content = $request->content;

        $posts = new Post();
        $posts->title = $title;
        $posts->image = $image;
        $posts->content = $content;

        $posts->save();
        
        return redirect('/admin/news/danhsach');
    }
}