<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BrandsController extends Controller
{
    function index(){
        return view('brands', [
            'title' => "Brands",
        ]);
    }
}
