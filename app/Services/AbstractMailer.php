<?php


namespace App\Services;


use Illuminate\Contracts\Mail\Mailer;
use Psr\Log\LoggerInterface;

abstract class AbstractMailer implements MailerInterface
{
    protected const DESTINATION_EMAIL = "maximgrosul@gmail.com";

    protected Mailer $mailer;

    protected LoggerInterface $logger;


    public function __construct(Mailer $mailer, LoggerInterface $logger)
    {
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    abstract public function send(array $input): void;
}
