<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\Response;

interface ResponseLoggerInterface
{
    /**
     * @param Response $response
     */
    public function logResponse(Response $response): void;
}
