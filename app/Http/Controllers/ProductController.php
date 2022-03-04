<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Experience;
use App\Models\Place;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function search(Request $request)
    {
            return ProductController::busqueda_parametrizada($request);
    }

    public function searchByPlace(Request $request,Place $place)
    {
        $experiences=Experience::where('status',1)->whereRelation('place','id',$place->id)->get();
        return view('guest.search',compact(['experiences']));
    }
    public function searchByCategory(Request $request,Category $category)
    {
        $experiences=$category->experiences->where('status',1);
        return view('guest.search',compact(['experiences']));
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
                    ->where('status', 1)->where('title', 'like', "%$request->search%")
                    ->where('place',$request->provincia)
                    ->whereHas('categories', function ($q) use ($request) {
                        $q->where('categories.id', $request->category);
                    })
                    ->paginate(10);

                  return view('guest.search',compact(['experiences']));
            default:
                $experiences = Experience::with('place')->paginate(10);
                  return view('guest.search',compact(['experiences']));
            break;
        }
    }
}