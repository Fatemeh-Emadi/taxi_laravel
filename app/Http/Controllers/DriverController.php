<?php

namespace App\Http\Controllers;
use App\Models\City;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    function register_get()
    {
        $cities=City::all();
       return view("register")->with([
           "cities"=>$cities
       ]);
    }
}
