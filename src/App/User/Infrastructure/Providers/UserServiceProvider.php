<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use Src\App\User\Application\Commands\LoginUser\LoginUserCommand;
use Src\App\User\Application\Commands\LoginUser\LoginUserCommandHandler;
use Src\App\User\Application\Commands\LogOut\LogOutUserCommand;
use Src\App\User\Application\Commands\LogOut\LogOutUserCommandHandler;
use Src\App\User\Domain\Contracts\AuthServiceContract;
use Src\App\User\Domain\Contracts\UserRepositoryContract;
use Src\App\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\App\User\Infrastructure\Services\AuthService;
use Src\Shared\Domain\Contracts\CommandBusContract;
use Src\Shared\Domain\Contracts\QueryBusContract;

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
        UserRepositoryContract::class => EloquentUserRepository::class,
        AuthServiceContract::class => AuthService::class,
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->registerCommandHandlers();
        $this->registerQueryHandlers();
    }

    /**
     * Register command handlers.
     */
    protected function registerCommandHandlers(): void
    {
        $commandBus = app(CommandBusContract::class);
        $commandBus->register([
            LoginUserCommand::class => LoginUserCommandHandler::class,
            LogOutUserCommand::class => LogOutUserCommandHandler::class,
        ]);
    }

    /**
     * Register query handlers.
     */
    protected function registerQueryHandlers(): void
    {
        $queryBus = app(QueryBusContract::class);
        /*
        $queryBus->register([
            LoginUserCommand::class => LoginUserCommandHandler::class,
        ]);*/
    }
}
