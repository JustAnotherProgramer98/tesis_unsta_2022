<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Experience;


use Illuminate\Http\Request;

class Product_ShopController extends Controller
{
    public function index()
    {
        
            $category = Category::where('status',1)->get();
            
            $experiences = Experience::where('status',1)->get();
            return view('guest.product_shop',compact(["experiences",'category']));
        
    }
}