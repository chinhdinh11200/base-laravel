<?php

namespace App\Http\Repositories;

interface BaseRepositoryInterface
{
    public function create($data);

    public function read($params);

    public function update($model, $data);

    public function delete($ids);

    public function find($id);
}
