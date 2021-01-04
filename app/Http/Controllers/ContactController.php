<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $this->validate($request, [
            'email' => 'bail|required|email',
            'sujet' => 'bail|required',
            'message' => 'bail|required'
        ]);


        Mail::send(new ContactMail($request));
        Session::flash('message', 'Votre message à été envoyez avec succes merci.');
        return redirect()->back();
    }



    public function contact()
    {
        return view('contact');
    }
}
