<?php

namespace Mingalevme\OneSignal\Exception;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class AllIncludedPlayersAreNotSubscribed extends ClientException
{
    public function __construct(
        RequestInterface $request,
        ResponseInterface $response,
        ?string $message = null,
        int $code = 0,
        Throwable $previous = null
    ) {
        $message = $message ?: 'All included players are not subscribed';
        parent::__construct($request, $response, $message, $code, $previous);
    }
}
