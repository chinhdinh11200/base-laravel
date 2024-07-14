<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserRequest;
use App\Http\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct() {
    }

    public function index()
    {
        return 123;
    }

    public function store(UserRequest $request) {
        try {
            return UserService::getInstance()->create($request->validated());
        } catch (\Exception $e) {
            logger($e);

            return "1234";
        }
    }
}
