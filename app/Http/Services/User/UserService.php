<?php

namespace App\Http\Services\User;

use App\Http\Decorators\User\LoggerUserDecorator;
use App\Http\Decorators\User\UserCreateDecorator;
use App\Http\Repositories\User\UserRepositoryInterface;
use App\Http\Requests\User\UserRequest;
use App\Http\Services\BaseService;
use Illuminate\Http\Request;

class UserService extends BaseService
{
    public function __construct(protected UserRepositoryInterface $repository)
    {
    }

    public function read($params)
    {
        // dd(1);
        // $this->userDecorator->read($params);
        $userLoggerDecorator = new LoggerUserDecorator($this->repository);
        $userLoggerDecorator->read($params);

        return $this->repository->read($params);
    }

    public function create($data)
    {
        $userCreateDecorator = new UserCreateDecorator($this->repository);
        $user = $userCreateDecorator->create($data);

        return $user;
    }
}
