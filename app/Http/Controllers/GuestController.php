<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\City;
use App\Models\Experience;
use App\Models\Place;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GuestController extends Controller
{
    public function index()
    {
        $categories = Category::where('status',1)->get();
        $places = Place::where('status',1)->get();
        $experiences = Experience::where('status',1)->get();
        return view('guest.shop',compact(['experiences','categories','places']));
        
    }
    public function create()
    {
        $provinces=Province::with('cities')->get();
        return view('guest.register', compact(["provinces"]));
    }
    public function store(Request $request)
    {
        $validated=$request->validate([
            'name' =>'required|string',
            'surname' =>'required|string',
            'birthday' =>'required|date',
            'gender'=>'required|integer',
            'phone' =>'required|string',
            'country_id' =>'required|integer',
            'province_id' =>'required|integer',
            'city_id' =>'required|integer',
            'adress' =>'required|string',
            'email' =>'required|string',
            'password' =>'required',
            
        ]);
        try {
            DB::transaction(function () use ($validated){
                $city=City::find($validated['city_id']);

                $user=User::create($validated+['role_id'=>2,'cuit'=>'not defined',
                'address'=>$validated['adress'],'city'=>$city->name,'province'=>$city->province->name
                ,'country'=>$city->province->country->name]);
                Auth::login($user);

            });
            return redirect()->route('experiencies.index')->with('status', 'Profile updated!');
        }
        catch (\Throwable $th) {
            return $th;
        }
        
    }
}