<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function pincodeAutocompleteSearch(Request $request)
    {
        //dd($request->pincode);
        $response = Http::get('https://api.postalpincode.in/pincode/' . $request->pincode);
        return $response->json();
    }
}
