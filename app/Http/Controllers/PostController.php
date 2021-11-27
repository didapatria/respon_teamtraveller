<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('home', [
            // ini array nanti buat isi datanya!!
            // sama harus buat model nya terlebih dahulu!!
        ]);
    }
}
