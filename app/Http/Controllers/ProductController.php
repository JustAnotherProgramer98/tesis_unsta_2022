<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Experience;


use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function search(Request $request)
    {
            return ProductController::busqueda_parametrizada($request);
    }

    public static function busqueda_parametrizada(Request $request)
    {
        switch ($request) {
            
            //Caso categoria y lugar
            case $request->category=="X" and $request->place != "X":
                $experiences = Experience::where('status', 1)
                ->whereHas('place', function ($q) use ($request) {
                    $q->where('id', $request->place);})->paginate(10);
                
                return view('guest.search',compact(['experiences']));
                break;
                
                //Caso solo categoria
            case $request->category!="X" and $request->search==null and $request->place == "X":
                $experiences = Experience::where('status', 1)
                ->whereHas('categories', function ($q) use ($request) {
                        $q->where('categories.id', $request->category);
                })->paginate(10);
    
                  return view('guest.search',compact(['experiences']));
                break;

                //Caso solo lugar
            case $request->category == null and $request->search == null:
                
                $experiencias = Experience::with('place')->where('status', 1)
                ->where('place', $request->place)->paginate(10);

                  return view('guest.search',compact(['experiences']));
                break;



                //Caso solo titulo
            case $request->search and  $request->category == "X" and $request->place == "X":
                $experiences = Experience::where('status', 1)->where('title', 'like', "%$request->search%")->paginate(10);
                return view('guest.search',compact(['experiences']));

                break;

                //Caso completo
            case $request->category and $request->place and $request->search:
                
                $experiences = Experience::with('place')
                    ->where('status', 1)->where('title', 'like', "%$search%")
                    ->where('place',$request->provincia)
                    ->whereHas('categories', function ($q) use ($request) {
                        $q->where('categories.id', $request->category);
                    })
                    ->paginate(10);

                  return view('guest.search',compact(['experiences']));
            default:
               
            break;
        }
    }
}