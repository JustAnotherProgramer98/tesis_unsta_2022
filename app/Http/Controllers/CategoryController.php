<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::latest()->paginate(8);    
        return view('admin.categories.index',compact(['categories']));
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
        ]);

        try {
            DB::transaction(function () use ($validated){
                Category::create($validated+[
                    'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $validated['title']))))), '-')),
                ]);                
            });
            return redirect()->route('categories.index.admin')->withSuccess(['Categoria creada correctamente']);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show',compact(['category']));
    }


    public function edit(Category $category)
    {
        return view('admin.categories.edit',compact(['category']));
    }


    public function update(Request $request, Category $category)
    {
          // image_id De momento no

          $validated=$request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'status'=>'required',
        ]);

        try {
            DB::transaction(function () use ($validated,$category){
                $category->update($validated+[
                    'slug'=>strtolower(trim(preg_replace('/[\s-]+/', '-', preg_replace('/[^A-Za-z0-9-]+/', '-', preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $validated['title']))))), '-')),
                ]);
                
            });            
            return redirect()->route('categories.index.admin');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy(Request $request)
    {
        try {
            return Category::where('id',$request->experience_id)->get()->first()->delete();
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
    public function approveCategory(Request $request)
    {
        try {
            return Category::where('id',$request->experience_id)->get()->first()->update(['status' => 1]);
        } catch (\Throwable $th) {
            return "error ".$th;
        }
    }
}
