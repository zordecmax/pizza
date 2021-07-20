<?php


namespace App\Services;


use Illuminate\Events\Dispatcher;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Response;

abstract class AbstractResponseLogger implements ResponseLoggerInterface
{
    private LoggerInterface $logger;
    protected Dispatcher $dispatcher;

    /**
     * AbstractResponseLogger constructor.
     * @param LoggerInterface $logger
     * @param Dispatcher $dispatcher
     */
    public function __construct(LoggerInterface  $logger, Dispatcher $dispatcher)
    {
        $this->logger = $logger;
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Response $response
     */
    public function logResponse(Response $response): void
    {
        $this->logger->info($this->generateMessageForResponse($response), $this->extractResponseData($response));
        $this->handlerFinishedRequestEvent($response);
    }

    /**
     * @param Response $response
     * @return string
     */
    protected function generateMessageForResponse(Response $response): string
    {
        if($response->isSuccessful()){
            return 'The response was success';
        }

        return 'Request could not be processed';
    }

    /**
     * @param Response $response
     * @return array
     */
    abstract protected function extractResponseData(Response $response): array;

    /**
     * @param Response $response
     * @return array
     */
    abstract protected function handlerFinishedRequestEvent(Response $response): void;
}
