<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()) {
            $places=Place::withCount('experiences')->latest()->paginate(8);            
            $provinces=Province::with('cities')->get();
            return view('admin.places.index',compact(['places','provinces']));
        }

    }

    public function store(Request $request)
    {
    // image_id De momento no
 
    $validated=$request->validate([
    'country_id'=>'required|integer',
    'province_id'=>'required|integer',
    'city_id'=>'required|integer',
    'adress'=>'required|string',
    'coordenates'=>'required|string',
    ]);

    try {
        DB::transaction(function () use ($validated){

        Place::create($validated);
    });
    return redirect()->route('places.index.admin');
    } catch (\Throwable $th) {
        throw $th;
    }
    }


    public function show(Place $place)
    {
        return view('admin.places.show',compact(['place']));
    }

    public function edit(Place $place)
    {
        if (Auth::user()) {
            $provinces=Province::with('cities')->get();
            return view('admin.places.edit',compact(['place','provinces']));
        }
    }


    public function update(Request $request, Place $place)
    {
        $validated=$request->validate([
            'country_id'=>'required|integer',
            'province_id'=>'required|integer',
            'city_id'=>'required|integer',
            'adress'=>'required|string',
            'status'=>'required',
            'coordenates'=>'required|string',
            ]);
        
            try {
                DB::transaction(function () use ($validated,$place){
        
                    $place->update($validated);
            });
            return redirect()->route('places.index.admin');
            } catch (\Throwable $th) {
                throw $th;
            }
    }

    public function destroy(Request $request)
    {
        try {
            return Place::where('id',$request->place_id)->get()->first()->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function approvePlace(Request $request)
    {
        
        try {
            return Place::where('id',$request->place_id)->get()->first()->update(['status' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
        
    }
    public function renderPlacesByProvince(Request $request)
    {
       $cities = City::where('province_id', $request->province_id)->get();

        return View::make("components.select-render-cities")->with(['cities'=>$cities])->render();
    }
}
