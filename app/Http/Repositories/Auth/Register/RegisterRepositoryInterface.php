<?php

namespace App\Http\Repositories\Auth\Register;

use App\Http\Repositories\BaseRepositoryInterface;

interface RegisterRepositoryInterface extends BaseRepositoryInterface
{
    public function register(array $data);
}
