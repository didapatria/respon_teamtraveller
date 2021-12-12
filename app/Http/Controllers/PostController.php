<?php

namespace App\Http\Controllers;

use App\Models\Post;
// use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // $title = '';
        // if (request('brand')) {
        //     // $brand = Brand::firstWhere('slug', request('brand'));
        //     // $title = ' in ' . $brand->name;
        // }

        // if (request('author')) {
        //     $author = User::firstWhere('username', request('author'));
        //     $title = ' by ' . $author->name;
        // }

        return view('home', [
            'title' => 'Home',
            // 'posts' => Post::latest()->filter(request(['search', 'brand', 'auhtor']))->paginate(7)->withQueryString()
            'posts' => Post::latest()->get()
        ]);
    }

    public function show(Post $post)
    {
        return view('detail', [
            "title" => "Detail",
            "post" => $post
        ]);
    }
}
