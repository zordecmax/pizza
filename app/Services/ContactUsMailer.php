<?php

namespace App\Services;


use Illuminate\Mail\Message;

class ContactUsMailer extends AbstractMailer
{
    public function send(array $input): void {
        ['message' => $message, 'email' => $email, 'name' => $name, 'subject' => $subject] = $input;
        $this->mailer->send(
            'emails.test',
            ['content' =>$message, 'email' => $email, 'name' => $name],
            function (Message $message) use ($subject){
                $message->to(self::DESTINATION_EMAIL);
                $message->subject($subject);
            });

        $this->logger->info("Contact us Mail send to " . self::DESTINATION_EMAIL);

    }
}
