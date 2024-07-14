<?php

namespace App\Http\Decorators\User;

use App\Http\Repositories\User\UserRepositoryInterface;

abstract class UserDecorator implements UserRepositoryInterface
{
    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @return $this
     */
    public function getInstance()
    {
        return app(static::class);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }

    public function read($params)
    {
        logger("có decorator");
        return $this->repository->read($params);
    }

    public function update($entity, $data)
    {
        $entity->update($data);

        return $entity;
    }

    public function delete($entity)
    {
        $entity->delete();

        return $entity;
    }

    public function find($id)
    {
        return $this->repository->find($id);
    }
}
