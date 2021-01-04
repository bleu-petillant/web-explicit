<?php

namespace App\Mail;
use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $contact;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->contact = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
    
        $email = $request->email;
        $sujet = $request->sujet;
        $message = $request->message;
        $contact_mail = 'davidfriquet27@gmail.com';
        return $this
        ->subject($sujet)
        ->from($email)
        ->to($contact_mail)
        ->view('email.contact');
    }
}
