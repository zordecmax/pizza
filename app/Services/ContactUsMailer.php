<?php


namespace App\Services;


use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Mail\Message;
use Psr\Log\LoggerInterface;

class ContactUsMailer
{
    private const DESTINATION_EMAIL = "maximgrosul@gmail.com";

    private Mailer $mailer;

    private LoggerInterface $logger;


    public function __construct(Mailer $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

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
