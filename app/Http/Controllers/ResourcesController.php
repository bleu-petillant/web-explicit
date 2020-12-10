<?php

namespace App\Http\Controllers;

use App\Models\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ResourcesController extends Controller
{

    public function __construct()
    {
        $this->middleware(['super']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resources = Resources::all();


        if(Auth::user()->role_id == 1)
        {

            return view('admin.ressources.index',compact('resources'));

        }
        else if(Auth::user()->role_id == 2)
        {

            return view('teacher.ressources.index',compact('resources'));
        }
        else
        {
           return view('404.404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role_id == 1)
        {
            return view('admin.ressources.create');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function show(Resources $resources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function edit(Resources $resources)
    {
        if(Auth::user()->role_id == 1)
        {
            return view('admin.ressources.edit');
        }else if(Auth::user()->role_id == 2)
        {
            return view('errors.permissions');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resources $resources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Resources  $resources
     * @return \Illuminate\Http\Response
     */
    public function destroy(Resources $resources)
    {
        //
    }
}
