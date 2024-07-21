<?php

namespace App\Http\Responses\Decorators;

use App\Http\Responses\ResponseInterface;

abstract class ResponseDecorator implements ResponseInterface
{
    protected $response;

    public function __construct(ResponseInterface $response)
    {
        $this->response = $response;
    }
}
