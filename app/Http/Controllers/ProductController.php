<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function cakes($slug)
    {
        dd($slug);
        return view('app.mobile.cakes');
    }
}
