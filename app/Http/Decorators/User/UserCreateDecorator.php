<?php

namespace App\Http\Decorators\User;

use App\Http\Repositories\User\UserRepositoryInterface;

class UserCreateDecorator extends UserDecorator
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function create($data)
    {
        $user = $this->repository->create($data);
        // create relation of user;
        $user->images()->create([
            'path' => 'path',
            'title' => 'title',
        ]);

        return $user;
    }

}
