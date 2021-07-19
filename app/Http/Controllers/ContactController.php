<?php

namespace App\Http\Controllers;

use App\Services\ContactUsMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    private ContactUsMailer $mailer;

    public function __construct(ContactUsMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function index()
    {
    }

    public function contact(Request $request)
    {
    }

    public function send(Request $request)
    {
        $formKey = $request->input('g-recaptcha-response');
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . env('RECAPTCHA_SECRET_KEY') . "&response={$formKey}";
        $recaptchaResponse = file_get_contents($url);
        $decodedResponse = json_decode($recaptchaResponse);
        if ($decodedResponse->success === false) {
            return Redirect::back()->withInput()->withErrors(['You are a robot']);
        };

        $this->mailer->send($request->validate([
            'subject' => 'required',
            'name' => 'required|max:100',
            'email' => 'required|max:255|email:rfc,dns',
            'message' => 'required|max:1000',
        ]));

        return Redirect::back()->with('success', 'Your message was sent');
    }
}
