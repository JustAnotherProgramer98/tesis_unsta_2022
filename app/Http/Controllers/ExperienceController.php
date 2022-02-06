<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Experience;
use App\Models\Image;
use App\Models\Languaje;
use App\Models\Place;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user() != null){
            if (Auth::user()->isAdmin()) {
                $experiences=Experience::latest()->paginate(8);
                $places=Place::all();
                $comment=Comment::all();
                $hosts = User::whereRelation('role', 'name','Anfitrion' )->get();
                $languajes=Languaje::all();
                $categories=Category::all();
                
                return view('admin.experiencies.index',compact(['experiences','places','hosts','languajes','comment','categories']));
            }
            
        }
        $experiences=Experience::where('status', 1)->get();
            return view('guest.index',compact(['experiences']));
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'description'=>'required|string',
            'place_id'=>'required|integer',
            'host_id'=>'required|integer',
            'languajes'=>'required|array',
            'price'=>'required',
            'quantity_clients'=>'required|integer',
            'images'=>'required'
        ]);
        
        $languajes=collect();
        foreach ($validated['languajes'] as $add_languaje) {
            $languajes->add(Languaje::where('id',$add_languaje)->get()->first());
        }

        try {
            DB::transaction(function () use ($validated,$languajes,$request){
                $experience=Experience::create($validated+[
                    'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $validated['title']))))), '-')),
                ]);
                
                foreach($request->images as $image_request){
                    $image = new Image;
                    $image_request->store('public');
                    $image->url=$image_request->hashName();
                    $image->alt="Imagen Experiencia";
                    $image->picturable_type=get_class($experience);
                    $image->picturable_id=$experience->id;
                    $image->save();
                    
                }

                foreach ($languajes as $languaje) {
                    $experience->languajes()->attach($languaje);
                }

                
            });
            return redirect()->route('experiencies.index.admin')->withSuccess(['Experiencia creada correctamente']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show(Experience $experience)
    {
        if (Auth::user()) {
            
            return view('admin.experiencies.show',compact(['experience']));
        }
        $experiences=Experience::all();
        return view('guest.index',compact(['experiences']));
    
    }

    public function edit(Experience $experience)
    {
        $places=Place::all();
        $hosts = User::whereRelation('role', 'name','Anfitrion' )->get();
        $languajes=Languaje::all();
        return view('admin.experiencies.edit',compact(['experience','places','hosts','languajes']));
    }


    public function update(Request $request, Experience $experience)
    {
         $validated=$request->validate([
            'title'=>'required|string',
            'subtitle'=>'required|string',
            'description'=>'required|string',
            'quantity_clients'=>'required|integer',
            'price'=>'required',
            'place_id'=>'required|integer',
            'host_id'=>'required|integer',
            'languajes'=>'required|array',
            'status'=>'required',
        ]);

        
        $languajes=collect();
        foreach ($validated['languajes'] as $add_languaje) {
            $languajes->add(Languaje::where('id',$add_languaje)->get()->first());
        }

        try {
            DB::transaction(function () use ($validated,$languajes,$experience,$request){
                $experience->update($validated+[
                    'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $validated['title']))))), '-')),
                ]);
                
                foreach ($languajes as $languaje) {
                    $experience->languajes()->attach($languaje);
                }

                if ($request->images==null) foreach($experience->images as $image_to_delete) $image_to_delete->delete(); 
                else {       
                    foreach($request->images as $image_request){
                    $image = new Image;
                    $image_request->store('public');
                    $image->url=$image_request->hashName();
                    $image->alt="Imagen Experiencia";
                    $image->picturable_type=get_class($experience);
                    $image->picturable_id=$experience->id;
                    $image->save();
                }
            }
                
            });            
            return redirect()->route('experiencies.index.admin');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Request $request)
    {
        try {
            $sales_experience=DB::table('sales')->where('experience_id',$request->experience_id);
            if ($sales_experience!=null or count($sales_experience)!=0) $sales_experience->delete();

            return Experience::where('id',$request->experience_id)->get()->first()->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function approveExperience(Request $request)
    {
        
        try {
            return Experience::where('id',$request->experience_id)->get()->first()->update(['status' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
        
    }
    public function search(Request $request)
    {
            $experiences=Experience::whereRelation('host', 'name','like','%'.$request->search.'%')->Orwhere('title', 'like', '%'.$request->search.'%')->latest()->paginate(8);
            $places=Place::all();
            $hosts = User::whereRelation('role', 'name','Anfitrion' )->get();
            $languajes=Languaje::all();
            return view('admin.experiencies.index',compact(['experiences','places','hosts','languajes']));
    }
    public function assignCategoryExperiencie(Request $request)
    {
        $validated=$request->validate([
            'experience_id'=>'required|integer',
            'category_id'=>'required|integer'
        ]);
        
        try {
            $category=Category::where('id',$request->category_id)->get()->first();
            Experience::where('id',$request->experience_id)->get()->first()->categories()->attach($category);
            return redirect()->route('experiencies.index.admin');
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
}
