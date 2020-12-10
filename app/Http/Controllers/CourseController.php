<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Category;
use App\Models\Reference;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;



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
        $references = Reference::all();
        $tags = Tag::all();
        if(Auth::user()->role_id == 1)
        {
            return view('admin.course.create',compact('categories','references','tags'));

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
            'title'=>'required|unique:courses,title',
            'category'=>'required',
            'resources'=>'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'video' => 'mimetypes:video/avi,video/mp4,video/webm,video/mkv,video/wmv,video/movie',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'video'=>'video',
            'alt'=>$request->alt,
            'category_id' => $request->category,
            'teacher_id'=>auth()->user()->id,
            'meta'=> $request->meta,
            'desc'=>$request->desc,
            'tag_id'=>1,
            'published_at'=> Carbon::now()
        ]);

        $course->tags()->attach($request->tags);


        if($request->hasFile('image') && $request->hasFile('video'))
        {

            $file = $request->file('image');
            $file_movie = $request->file('video');

            // Get filename with extension
            $filenameWithExt = $file->getClientOriginalName();
            $filename_movWithExt = $file_movie->getClientOriginalName();

            // Get file path
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $filename_movie = pathinfo($filename_movWithExt, PATHINFO_FILENAME);

            // Remove unwanted characters
            $filename = preg_replace("/[^A-Za-z0-9 ]/", '', $filename);
            $filename = preg_replace("/\s+/", '-', $filename);

            $filename_movie = preg_replace("/[^A-Za-z0-9 ]/", '', $filename_movie);
            $filename_movie = preg_replace("/\s+/", '-', $filename_movie);

            // Get the original image extension
            $extension = $file->getClientOriginalExtension();
            $extension_mov = $file_movie->getClientOriginalExtension();

            // Create unique file name
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $fileMovieNameToStore = $filename_movie.'_'.time().'.'.$extension_mov;

            $file->move('storage/course/thumb/',$fileNameToStore);
            $course->image = 'storage/course/thumb/' .$fileNameToStore;

            $file_movie->move('storage/course/video/',$fileMovieNameToStore);
            $course->video = 'storage/course/video/' .$fileMovieNameToStore;
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
    public function destroy( $id)
    {
        $course = Course::find($id);
        if($course)
        {
            if(file_exists(public_path($course->image)))
            {
                unlink(public_path($course->image));
            }
            if(file_exists(public_path($course->video)))
            {
                unlink(public_path($course->video));
            }

            $course->delete();
            return view('admin.course.index');
        }
    }
}
