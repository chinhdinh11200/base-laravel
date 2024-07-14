<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Test1Exception extends Exception
{
    public function report(): void
    {

    }

    public function render(Request $request): Response
    {
        dd(1);
        return response();
    }

    public function context(): array
    {
        return [];
    }

    public function isValid(): bool
    {
        return true;
    }
}
