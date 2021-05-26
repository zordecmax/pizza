<?php

namespace App\Http\Controllers;

use App\Services\ContactUsMailer;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private ContactUsMailer $mailer;

    public function __construct(ContactUsMailer $mailer) {
        $this->mailer = $mailer;
    }

    public function index()
    {
    }

    public function contact(Request $request){

    }

    public function send(Request $request) {

        $this->mailer->send($request->validate([
            'subject' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|max:255|email:rfc,dns',
            'message' => 'required|max:1000',
        ]));

        return redirect( '/contacts');
    }

}
