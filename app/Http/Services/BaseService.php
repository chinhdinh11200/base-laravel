<?php

namespace App\Http\Services;

class BaseService {

    /**
     * @return $this
     */
    public static function getInstance() {
        return app(static::class);
    }
}
