<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function importPincodeCityDistrictStateCountry()
    {
        City::chunk(200, function ($cities) {
            foreach ($cities as $city) {
                //dd($gdsstate);
                // $citySlug = Str::slug($city->name);
                //$city->update(['slug' => $citySlug]);
            }
        });
    }
}
