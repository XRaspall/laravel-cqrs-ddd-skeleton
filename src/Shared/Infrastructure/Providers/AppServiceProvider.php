<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Shared\Domain\Contracts\CommandBusContract;
use Src\Shared\Domain\Contracts\QueryBusContract;
use Src\Shared\Infrastructure\Bus\IlluminateCommandBus;
use Src\Shared\Infrastructure\Bus\IlluminateQueryBus;

class AppServiceProvider extends ServiceProvider
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
        CommandBusContract::class => IlluminateCommandBus::class,
        QueryBusContract::class => IlluminateQueryBus::class,
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
