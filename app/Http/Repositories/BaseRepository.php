<?php

namespace App\Http\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(protected Model $model)
    {
    }

    public function create($data)
    {
        return $this->model->create($data);
    }
    
    public function read($params)
    {
        return $this->model->filter($params);
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
        return $this->model->find($id);
    }
}
