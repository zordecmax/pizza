<?php

namespace App\Http\Controllers;

use App\Services\ContactUsMailer;
use Illuminate\Http\Request;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;

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

//        \Mail::raw('test', function (Message $message) {
//            $message->to('test@test.md');
//            $message->subject('testing mailing');
//        });
//
//        $this->mailer->send(
//            'emails.test',
//            ['content' => $request->input('message'), 'email' => $request->input('email')],
//            function (Message $message) use ($request){
//            $message->to('test@test.md');
//            $message->subject('testing mailing');
//        });

        $this->mailer->send($request->all());  //TODO validated

        return redirect( '/');
    }

}
