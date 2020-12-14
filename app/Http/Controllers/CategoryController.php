<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['admin']);


    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if(Auth::user()->role_id == 1){
            return view('admin.category.index',compact('categories'));
        }else if(Auth::user()->role_id == 2)
        {
            return view('teacher.category.index',compact('categories'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id == 1){
           return view('admin.category.create');
        }else if(Auth::user()->role_id == 2)
        {
           return view('errors.permissions');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
        [
            'name'=>'required|unique:categories,name',

        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'desc' => $request->desc
        ]);

        $request->session()->flash('success', 'la catégorie as bien été créer');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        if(Auth::user()->role_id == 1){
           return view('admin.category.edit',compact('category'));
        }else if(Auth::user()->role_id == 2)
        {
           return view('errors.permissions');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request,
        [
            'name'=>"required|unique:categories,name,$category->name",
            'desc'=>"sometimes|nullable",

        ]);


            $name = $request->input('name');
            $slug = Str::slug($name,'-');
            $description = $request->input('desc');

            $category->name = $name;
            $category->slug = $slug;
            if($category->isClean('desc'))
            {
                $description = $category->description;
            }else{
                $category->desc = $description;
            }



        $category->save();

        Session::flash('success', 'la catégorie as bien été modifiée');

        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if($category)
        {
            $category->delete();
            Session::flash('success', 'la catégorie as bien été suprimer');
            return redirect()->back();
        }

    }
}
