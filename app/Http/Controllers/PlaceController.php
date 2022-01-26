<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
            $places=Place::withCount('experiences')->paginate(6);            
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

        Place::create($validated+[
            'status'=>Auth::user()->isAdmin() ? 1 : 0
        ]);
    });
    return redirect()->route('places.index.admin');
    } catch (\Throwable $th) {
        throw $th;
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        if (Auth::user()) {
            $provinces=Province::with('cities')->get();
            return view('admin.places.edit',compact(['place','provinces']));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            return Place::where('id',$request->place_id)->get()->first()->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
}
