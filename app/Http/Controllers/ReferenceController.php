<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Category;
use App\Models\Reference;
use Conner\Tagging\Model\Tag as ModelTag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReferenceController extends Controller
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
        $reference = Reference::all();
        $categories = Category::all();


        if(Auth::user()->role_id == 1)
        {

            return view('admin.ressources.index',compact('reference','categories'));

        }
        else if(Auth::user()->role_id == 2)
        {

            return view('teacher.ressources.index',compact('reference'));
        }
        else
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
        $tags = Reference::existingTags()->pluck('name');
      
        $categories = Category::all();
  
        return view('admin.ressources.create',compact('categories','tags'));
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
            'category'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'pdf'=>'nullable|mimetypes:application/pdf',
            'link'=>'nullable|active_url',
            'tags' => 'required',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);
        $tags = explode(",", $request->tags);
        $ressources = Reference::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'pdf'=>'pdf',
            'link'=>$request->link,
            'alt'=>$request->alt,
            'category_id' => $request->category,
            'teacher_id'=>auth()->user()->id,
            'meta'=> $request->meta,
            'desc'=>$request->desc,
            'tag_id'=>1,
            'published_at'=> Carbon::now()
        ]);
            $ressources->tag($tags);
           
        


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

            $file->move('storage/ressources/thumb/',$fileNameToStore);
            $ressources->image = 'storage/ressources/thumb/' .$fileNameToStore;
           
        }

        if($request->hasFile('pdf') )
        {
            $file = $request->file('pdf');

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

            $file->move('storage/ressources/pdf/',$fileNameToStore);
            $ressources->pdf = 'storage/ressources/pdf/' .$fileNameToStore;
            
        }

        $ressources->save();

        $request->session()->flash('success', 'votre ressources as bien été publier');
        return redirect('admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function edit(Reference $reference)
    {
        $categories = Category::all();
        $tags = ModelTag::all();
        return view('admin.ressources.edit',compact(['reference','categories','tags']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reference $reference)
    {
        $this->validate($request,
        [
            'title'=>'sometimes',
            'category'=>'required',
            'link'=>'nullable|active_url',
            'alt'=>'sometimes',
            'meta'=>'sometimes',
            'desc'=>'sometimes',
        ]);
           
            if($reference->isClean('title'))
            {
                
                $reference->title  = $reference->title;
            }
            if($reference->isClean('desc'))
            {
                
                $reference->desc  = $reference->desc;
            }
            
            $reference->title  = $request->title;
            $reference->slug  = Str::slug($reference->title,'-');
            $reference->link = $request->link;
            $reference->alt = $request->alt;
            $reference->category_id  = $request->category;
            $reference->teacher_id =auth()->user()->id;
            $reference->meta = $request->meta;
            $reference->desc =$request->desc;
            $reference->published_at = Carbon::now();



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

            $file->move('storage/ressources/thumb/',$fileNameToStore);
            $reference->image = 'storage/ressources/thumb/' .$fileNameToStore;
           
        }

        if($request->hasFile('pdf') )
        {
            $file = $request->file('pdf');

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

            $file->move('storage/ressources/pdf/',$fileNameToStore);
            $reference->pdf = 'storage/ressources/pdf/' .$fileNameToStore;
            
        }

        $reference->save();

        $request->session()->flash('success', 'votre ressources as bien été modifier');
        return redirect('admin/reference');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reference $reference)
    {
        //
    }
}
