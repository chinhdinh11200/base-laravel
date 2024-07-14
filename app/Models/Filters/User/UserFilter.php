<?php

namespace App\Models\Filters\User;

use App\Models\Filters\QueryFilter;

class UserFilter extends QueryFilter
{
    protected $columns;

    public function columns($columns)
    {
        $this->columns = $columns;
    }

    public function active($value) {
        // dd($this, $value);
    }
}
