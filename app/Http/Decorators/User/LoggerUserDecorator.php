<?php

namespace App\Http\Decorators\User;

use App\Http\Repositories\User\UserRepositoryInterface;

class LoggerUserDecorator extends UserDecorator
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function read($params)
    {
        logger("có decorator");
        return $this->repository->read($params);
    }
}
