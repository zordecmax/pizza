<?php

namespace App\Http\Middleware;


use App\Services\RequestLoggerInterface;
use Closure;

class RequestLoggingMiddleware
{
    private RequestLoggerInterface $requestLogger;

    public function __construct(RequestLoggerInterface $requestLogger)
    {
        $this->requestLogger = $requestLogger;
    }

    /**
     * Handle on incoming request
     *
     * @param $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->requestLogger->logRequest($request);

        $response = $next($request);

        return $response;
    }
}
