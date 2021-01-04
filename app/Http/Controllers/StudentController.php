<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use Session;
use Carbon\Carbon;
class StudentController extends Controller
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
        $students = DB::table('users')->
            where('role_id','=','3')
            ->get();

        if(Auth::user()->role_id == 1)
        {

            return view('admin.student.index',compact('students'));

        }
        else if(Auth::user()->role_id == 2)
        {

            return view('teacher.student.index',compact('students'));
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

         return view('admin.student.create');

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
            'prenom' => ['required', 'string', 'max:70'],
            'name' => ['required', 'string', 'max:70'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'role_id' => ['required','exists:App\Models\Role,id']
        ])->validate();

        $student = User::create([
            'prenom' => $request['prenom'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);

        $request->session()->flash('success', 'l\'étudient a été créée avec succès');
        return redirect()->to('admin/student');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.student.show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.student.edit',compact('user'));
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
        $student = User::find($id);
        Validator::make($request->all(), [
            'prenom' => ['sometimes', 'string', 'max:70'],
            'name' => ['sometimes', 'string', 'max:70'],
            'email' => ['sometimes', 'email', 'max:255', Rule::unique('users')->ignore($student->id)],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validate();

            $prenom = $request->input('prenom');
            $nom = $request->input('name');
            $email = $request->input('email');
            if($student->isClean('prenom'))
            {
                $prenom = $student->prenom;
            }
            if($student->isClean('name'))
            {
                $nom = $student->name;
            }
            if($student->isClean('email'))
            {
                $email = $student->email;
            }
            $student->forceFill([
                'prenom' => $request['prenom'],
                'name' => $request['name'],
                'email' => $request['email'],
            ])->save();

        $request->session()->flash('success', 'l\'étudient a été modifié avec succès');
        return redirect()->route('student.index');
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
