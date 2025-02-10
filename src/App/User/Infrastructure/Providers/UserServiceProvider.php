<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\App\User\Domain\Contracts\UserRepositoryContract;
use Src\App\User\Infrastructure\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    /**
     * All the container bindings that should be registered.
     *
     * @var array
     */
    public $bindings = [];

    /**
     * All the container singletons that should be registered.
     *
     * @var array
     */
    public $singletons = [
        UserRepositoryContract::class => UserRepository::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
