<?php


namespace App\Services;



interface MailerInterface
{
    public function send(array $input): void;
}
