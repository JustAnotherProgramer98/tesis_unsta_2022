<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Image;
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
    $validated=$request->validate([
    'images'=>'required',
    'country_id'=>'required|integer',
    'province_id'=>'required|integer',
    'city_id'=>'required|integer',
    'adress'=>'required|string',
    'coordenates'=>'required|string',
    ]);

    try {
        DB::transaction(function () use ($validated,$request){
        $place=Place::create($validated);

        foreach($request->images as $image_request){
            $image = new Image();
            $image_request->store('public');
            $image->url=$image_request->hashName();
            $image->alt="Imagen Lugar";
            $image->picturable_type=get_class($place);
            $image->picturable_id=$place->id;
            $image->save();
            
        }
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
                DB::transaction(function () use ($validated,$place,$request){
                    $place->update($validated);

                    if ($request->images==null) foreach($place->images as $image_to_delete) $image_to_delete->delete(); 
                    else {       
                        foreach($request->images as $image_request){
                        $image = new Image;
                        $image_request->store('public');
                        $image->url=$image_request->hashName();
                        $image->alt="Imagen Experiencia";
                        $image->picturable_type=get_class($place);
                        $image->picturable_id=$place->id;
                        $image->save();
                    }
                }
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