<?php

namespace App\Http\Middleware;

use App\Services\RequestLoggerInterface;
use App\Services\ResponseLoggerInterface;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LoggingMiddleware
{
    private RequestLoggerInterface $requestLogger;
    private ResponseLoggerInterface $responseLogger;

    public function __construct(RequestLoggerInterface $requestLogger, ResponseLoggerInterface $responseLogger)
    {
        $this->requestLogger = $requestLogger;
        $this->responseLogger = $responseLogger;
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

        $this->responseLogger->logResponse($response);

        return $response;
    }

    public function terminate($request, $response)
    {
        \Log::alert('Executed after response!', [
            'date' => date(DATE_ATOM),
                'isRequest' => $request instanceof Request,
                'isResponse' => $request instanceof Response,
            ]);
    }
}
