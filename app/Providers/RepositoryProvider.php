<?php

namespace App\Providers;

use App\Http\Repositories\User\UserRepository;
use App\Http\Repositories\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    protected $repositories = [
        // 'key' => [
        //     'class interface',
        //     'class repository'
        // ],
        [
            UserRepositoryInterface::class,
            UserRepository::class,
        ]
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        foreach ($this->repositories as $key => $repository) {
            $this->app->bind($repository[0], $repository[1]);
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
