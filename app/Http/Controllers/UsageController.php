<?php

namespace App\Http\Controllers;

use App\Models\Usage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
class UsageController extends Controller
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
        $usages = Usage::all();
        return view('admin.usages.index',compact('usages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        return view('admin.usages.create');
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
            'title'=>'required|unique:courses,title',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'link'=>'nullable|active_url',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);

        
        $usages = Usage::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'link'=>$request->link,
            'alt'=>$request->alt,
            'teacher_id'=>auth()->user()->id,
            'meta'=> $request->meta,
            'desc'=>$request->desc,
            'published_at'=> Carbon::now()
        ]);


        if($request->hasFile('image') )
        {
            $file = $request->file('image');

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();

            // Get file path
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

            // Get the original image extension
            $extension = $file->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $file->move('storage/usages/thumb/',$fileNameToStore);
            $usages->image = 'storage/usages/thumb/' .$fileNameToStore;
           
        }

        $usages->save();

        $request->session()->flash('success', 'votre cas d\'usage as bien été publier');
        return redirect('admin/usage');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function show(Usage $usage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function edit(Usage $usage)
    {
        return view('admin.usages.edit',compact(['usage']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usage $usage)
    {
        $this->validate($request,
        [
            'title'=>'required',
            'link'=>'nullable|active_url',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);
           
            if($usage->isClean('title'))
            {
                
                $usage->title  = $usage->title;
            }
            if($usage->isClean('desc'))
            {
                
                $usage->desc  = $usage->desc;
            }

            if($usage->isClean('image'))
            {
                $usage->image  = $usage->image;
            }


            $usage->title  = $request->title;
            $usage->slug  = Str::slug($usage->title,'-');
            $usage->link = $request->link;
            $usage->alt = $request->alt;
            $usage->teacher_id =auth()->user()->id;
            $usage->meta = $request->meta;
            $usage->desc =$request->desc;
            $usage->published_at = Carbon::now();




        if($request->hasFile('image') )
        {
            $file = $request->file('image');

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();

            // Get file path
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

            // Get the original image extension
            $extension = $file->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;

            $file->move('storage/usages/thumb/',$fileNameToStore);
            $usage->image = 'storage/usages/thumb/' .$fileNameToStore;
           
        }

        $usage->save();

        $request->session()->flash('success', 'votre cas d\'usage as bien été modifier');
        return redirect('admin/usage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usage  $usage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usage $usage)
    {
        //
    }
}
