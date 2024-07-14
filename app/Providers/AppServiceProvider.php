<?php

namespace App\Providers;

use App\Http\Decorators\User\LoggerUserDecorator;
use App\Http\Repositories\User\Repository;
use App\Http\Repositories\User\RepositoryInterface;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
        $this->app->bind(RepositoryInterface::class, function($app) {
            $repository = new Repository(new User());

            $repository = new LoggerUserDecorator($repository);

            return $repository;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
