<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Http\Services\Auth\RegisterService;

class RegisterController extends Controller
{
    public function __construct(protected RegisterService $registerService)
    {
        
    }

    public function register(RegisterRequest $request)
    {
        try {
            
        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
