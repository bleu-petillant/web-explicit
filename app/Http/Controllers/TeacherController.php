<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Validation\Rule;
class TeacherController extends Controller
{
    use PasswordValidationRules;
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
        $teachers = DB::table('users')->
        where('role_id','=','2')
        ->get();
        if(Auth::user()->role_id == 1)
        {
            return view('admin.teacher.index',compact('teachers'));

        }else if(Auth::user()->role_id == 2)
        {
            return view('teacher.teacher.index',compact('teachers'));
        }else
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
            return view('admin.teacher.create');
        }else
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
        Validator::make($request->all(), [
            'prenom' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_id' => ['required','exists:App\Models\Role,id']
        ])->validate();

        $teacher = User::create([
            'prenom' => $request['prenom'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
        $teacher->students()->attach($teacher);

        $request->session()->flash('success', 'le professeur a été créée avec succès');
        return redirect()->to('admin/teacher');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = User::findOrFail($id);
        return view('admin.teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = User::find($id);
        Validator::make($request->all(), [
            'prenom' => ['sometimes', 'string', 'max:255'],
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($teacher->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validate();

            $prenom = $request->input('prenom');
            $nom = $request->input('name');
            $email = $request->input('email');
            if($teacher->isClean('prenom'))
            {
                $prenom = $teacher->prenom;
            }
            if($teacher->isClean('name'))
            {
                $nom = $teacher->name;
            }
            if($teacher->isClean('email'))
            {
                $email = $teacher->email;
            }
            $teacher->forceFill([
                'prenom' => $request['prenom'],
                'name' => $request['name'],
                'email' => $request['email'],
            ])->save();

        $request->session()->flash('success', 'le professeur a été modifié avec succès');
        return redirect()->route('teacher.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
