<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Category;
use App\Models\Resources;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class CourseController extends Controller
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
        $course = Course::all();


        if(Auth::user()->role_id == 1)
        {

            return view('admin.course.index',compact('course'));

        }
        else if(Auth::user()->role_id == 2)
        {

            return view('teacher.course.index',compact('course'));
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

        $categories = Category::all();
        $resources = Resources::all();
        if(Auth::user()->role_id == 1)
        {
            return view('admin.course.create',compact('categories','resources'));

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
            'title'=>'required|unique:posts,title',
            'category'=>'required',
            'resources'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'alt'=>$request->alt,
            'category_id' => $request->category,
            'resource_id' => $request->resources,
            'meta'=> $request->meta,
            'published_at'=> Carbon::now()
        ]);

        $course->resources()->attach($request->resources);

        // foreach ($request->input('thumbnail', []) as $file) {
        //     $course->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('thumbnail');
        // }

        // if ($request->input('video', false)) {
        //     $course->addMedia(storage_path('tmp/uploads/' . $request->input('video')))->toMediaCollection('video');
        // }

        // if ($media = $request->input('ck-media', false)) {
        //     Media::whereIn('id', $media)->update(['model_id' => $course->id]);
        // }

        if($request->hasFile('image'))
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

            $file->move('storage/post/',$fileNameToStore);
            $course->image = 'storage/post/' .$fileNameToStore;
            $course->save();
        }

        $request->session()->flash('success', 'votre cours as bien été publier');
        return redirect('admin/course');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        if(Auth::user()->role_id == 1)
        {
            return view('admin.course.edit');
        }else if(Auth::user()->role_id == 2)
        {
            return view('errors.permissions');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
