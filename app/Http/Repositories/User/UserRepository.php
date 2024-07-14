<?php

namespace App\Http\Repositories\User;

use App\Http\Repositories\BaseRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function read($params) {
        logger("không có decorator");
        return ['data']; //$this->model->filter($params);
    }
}
