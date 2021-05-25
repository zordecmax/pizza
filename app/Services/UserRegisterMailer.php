<?php


namespace App\Services;


use Illuminate\Mail\Message;

class UserRegisterMailer extends AbstractMailer
{
    public function send(array $input): void
    {
        ['name' => $name, 'email' => $email] = $input;
        $this->mailer->send(
            'emails.user',
            [ 'email' => $email, 'name' => $name],
            function (Message $message) use ($email){
                $message->to(self::DESTINATION_EMAIL);
                $message->to($email);
                $message->subject('New user registered');
            });

        $this->logger->info('New user registered' . $name);
    }
}
