<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Experience;
use App\Models\Languaje;
use App\Models\Place;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HostController extends Controller
{
public function show(User $user)
{
    if (!(Auth::user()->role->name == 'Administrador')) {
        $provinces=Province::all();
        $places=Place::where('status',1)->get();
        $categories=Category::where('status',1)->get();
        $languajes=Languaje::all();        
        return view('guest.my_profile',['user'=>$user,'places'=>$places,'languajes'=>$languajes,'provinces'=>$provinces,'categories'=>$categories]);
    }
}
public function store(Request $request)
{
    $validated=$request->validate([
        'title'=>'required|string',
        'subtitle'=>'required|string',
        'price'=>'required',
        'description'=>'required|string',
        "province_name" => "required",
        "city_name" => "required",
        "address" => "required",
        "coordenates" => "required",
        'languajes'=>'required|array'
    ],[
        'title.required'=>'El campo titulo es requerido',
        'subtitle.required'=>'El campo subtitulo es requerido',
        'price.required'=>'Necesitamos saber el precio de la experiencia para crearla',
        'description.required'=>'Sin una descripcion , no podemos crear la experiencia',
        "province_name.required" => "La provincia es requerida",
        "city_name.required" => "La ciduad es requerida",
        "address.required" => "El campo direccion es requerido",
        "coordenates.required" => "Las coordenadas del lugar son requeridas",
        'languajes.required'=>'Necesitamos saber los lenguajes de la experiencia'
    ]);
try {
    DB::transaction(function () use ($validated,$request){
    $languajes=collect();
    foreach ($validated['languajes'] as $add_languaje) $languajes->add(Languaje::where('id',$add_languaje)->get()->first());

    //Si da nulo es porque no esta la provincia en la BD
    //Logica de creacion de mas ciudades y provincias en caso de que no se ingrese una existente 
    $province=Province::where('name',$request->province_name)->get()->first();
    if($province!=null){
        $city=City::where('name',$request->city_name)->where('province_id',$province->id)->get()->first();
        if ($city!=null) $place=Place::firstOrCreate(['city_id'=>$city->id,'adress'=>$request->address,],['coordenates'=>$request->coordenates,'status'=>2]);
    }
    else{
        $province=Province::create(['name'=>$request->province_name,'country_id'=>1,'status'=>2]);
        $city=City::create(['province_id'=>$province->id,'name'=>$request->city_name,'status'=>2]);
        $place=Place::firstOrCreate(['city_id'=>$city->id,'adress'=>$request->address,],['coordenates'=>$request->coordenates,'status'=>2]);
    }

    $category=Category::where('title',$request->category_name)->get()->first();
    if($category==null) $category=Category::create(['title'=>$request->category_name,'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $request->category_name))))), '-')),'description'=>'X','status'=>2]);
    
    
    $experience=Experience::create($validated+[
        'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $validated['title']))))), '-')),
        'place_id'=>$place->id,
        'host_id'=>Auth::user()->id,
        'status'=>2,
        ]);
    
        foreach ($languajes as $languaje) $experience->languajes()->attach($languaje);
        $experience->categories()->attach($category);
    });
        return redirect()->route('hosts.index',Auth::user());
    } catch (\Throwable $th) {
        throw $th;
    }

}

}