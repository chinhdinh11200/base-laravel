<?php

namespace App\Http\Services\Auth;

use App\Http\Repositories\Auth\Register\RegisterRepositoryInterface;
use App\Http\Services\BaseService;

class RegisterService extends BaseService
{
    public function __construct(protected RegisterRepositoryInterface $repository)
    {
    }

    public function register(array $data)
    {
    }
}
