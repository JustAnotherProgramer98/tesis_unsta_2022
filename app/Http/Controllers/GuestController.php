<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Place;
use App\Models\Experience;


use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index()
    {
        
            $category = Category::where('status',1)->get();
            $places = Place::where('status',1)->get();
            $experiences = Experience::where('status',1)->get();
            return view('guest.shop',compact(["experiences",'category',"places"]));
        
    }
}