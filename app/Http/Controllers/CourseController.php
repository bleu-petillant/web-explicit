<?php

namespace App\Http\Controllers;


use App\Models\Course;
use App\Models\Reponse;
use App\Models\Category;
use App\Models\Question;
use App\Models\Reference;
use App\Models\CourseUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;



class CourseController extends Controller
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

        $references = Reference::all();
        if(Auth::user()->role_id == 1)
        {
            return view('admin.course.create',compact('references'));

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
            'resources'=>'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);

        $course = Course::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title,'-'),
            'image' => 'image',
            'alt'=>$request->alt,
            'teacher_id'=>auth()->user()->id,
            'meta'=> $request->meta,
            'desc'=>$request->desc,
            'published_at'=> Carbon::now()
        ]);

 
        foreach (request('ref') as $ref) {
            $course -> references() ->attach($ref);
        }

        //$course->references()->sync($ref_id);



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
            $file->move('storage/course/thumb/',$fileNameToStore);
            $course->image = 'storage/course/thumb/' .$fileNameToStore;
            
        }


        $course->save();

        $request->session()->flash('success', 'votre cours as bien été publier');

     
        $courses = Course::with('questions','users')->get();
        $course_id =$course->id;
        $title = $course->title;
        $questions =Question::all();
        $references = Reference::all();
        $reponses = Reponse::all();
    
        
        return view('admin.questions.create', compact(['reponses','courses','references','questions','course_id','title']));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        $course_id = $course->id;
        $ref_course = Course::where('id',$course_id)->with('references')->first();
        $ref = $ref_course->references()->get();
        $first = $ref[0];
        $second = $ref[1];
   
        $references = Reference::all();
        if(Auth::user()->role_id == 1)
        {
            
            return view('admin.course.edit',compact(['course','references','first','second']));
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
        $this->validate($request,
        [
            'title'=>'required',
            'alt'=>'required',
            'meta'=>'required',
            'desc'=>'required',
        ]);
           
            if($course->isClean('title'))
            {
                
                $course->title  = $course->title;
            }
            if($course->isClean('desc'))
            {
                
                $course->desc  = $course->desc;
            }
            if($course->isClean('meta'))
            {
                
                $course->title  = $course->title;
            }
            if($course->isClean('alt'))
            {
                
                $course->desc  = $course->desc;
            }
            $ref =  $request->ref;
            $course ->references()->sync($ref,['course_id'=>$course->id,'reference_id'=>$ref],true);



            $course->title  = $request->title;
            $course->slug  = Str::slug($course->title,'-');
            $course->alt = $request->alt;
            $course->teacher_id =auth()->user()->id;
            $course->meta = $request->meta;
            $course->desc =$request->desc;
            $course->published_at = Carbon::now();

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

            $file->move('storage/course/thumb/',$fileNameToStore);
            $course->image = 'storage/course/thumb/' .$fileNameToStore;

            
        }

        $course->save();

        $request->session()->flash('success', 'cette formation as bien été modifier');
        return redirect('admin/course');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $course = Course::with('references','users')->find($id);
        $questions = Question::with('references','reponses')->where('course_id',$id)->get();

       if($questions){
            foreach ($questions as $q ) {
                $reponses = Reponse::where('question_id',$q->id)->get();
                 if($reponses){
                    foreach ($reponses as $r ) {

                        $r->delete();
                    }
                }
                $q ->references()->detach();
                $q->delete();

                if(file_exists(public_path($q->video)))
                {
                    unlink(public_path($q->video));
                    Storage::delete($q->video);
                }
                
            }
       }

        if($course)
        {
            if(file_exists(public_path($course->image)))
            {
                unlink(public_path($course->image));
            }

            $course->users()->detach();
            $course->references()->detach();
            $course->delete();
            return view('admin.course.index');
        }
    }
}
