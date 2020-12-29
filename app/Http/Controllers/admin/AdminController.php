<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;


class AdminController extends Controller
{
    use PasswordValidationRules;
    public function __construct()
    {
        $this->middleware('super');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function index()
    {
        $admin = DB::table('users')->
            where('role_id','=','1')
            ->get();

        if(Auth::user()->role_id == 1)
        {

            return view('admin.index',compact('admin'));

        }
        else if(Auth::user()->role_id == 2)
        {

            return view('errors.permissions');
        }
        else
        {
           return view('errors.permissions');
        }
    }

        public function create()
    {

         return view('admin.action.create');

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

        $admin = User::create([
            'prenom' => $request['prenom'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role_id' => $request['role_id'],
        ]);
        $admin->students()->attach($admin);
        $request->session()->flash('success', 'l\'admin a été créée avec succès');
        return redirect()->to('admin/list');





    }



}
