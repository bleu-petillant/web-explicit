<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $tags = Tag::all();
        if(Auth::user()->role_id == 1){

            return view('admin.tag.index',compact('tags'));

        }else if(Auth::user()->role_id == 2)
        {
            return view('errors.permissions');
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

            return view('admin.tag.create');

        }else if(Auth::user()->role_id == 2)
        {
            return view('teacher.tag.create');
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
            'name'=>'required|unique:tags,name',

        ]);

        Tag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name,'-'),
            'description' => $request->description
        ]);

        $request->session()->flash('success', 'le tag as bien été créer');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if(Auth::user()->role_id == 1){

            return view('admin.tag.edit',compact('tag'));

        }else if(Auth::user()->role_id == 2)
        {
            return view('errors.permissions');
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,
        [
            'name'=>"required|unique:tags,name,$tag->name",

        ]);


            $name = $request->input('name');
            $slug = Str::slug($name,'-');

            $tag->name = $name;
            $tag->slug = $slug;

            $tag->save();

        Session::flash('success', 'le tag as bien été modifiée');
        return redirect('admin/tag');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag)
        {
            $tag->delete();
            Session::flash('success', 'le tag as bien été suprimer');
            return redirect()->back();
        }
    }
}
