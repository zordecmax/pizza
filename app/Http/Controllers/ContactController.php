<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactPostRequest;
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


    public function send(ContactPostRequest $request)
    {
        $formKey = $request->input('g-recaptcha-response');
        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" .
            env('RECAPTCHA_SECRET_KEY') . "&response={$formKey}";

        try {
            $recaptchaResponse = file_get_contents($url);
        } catch (\Exception $ex) {
            return Redirect::back()->withInput()->withErrors(['Captcha wrong']);
        }

        $decodedResponse = json_decode($recaptchaResponse);

        if ($decodedResponse->success === false) {
            return Redirect::back()->withInput()->withErrors(['You are a robot']);
        };

        $this->mailer->send($request->validated());


        return Redirect::back()->with('success', 'Your message was sent');
    }
}
