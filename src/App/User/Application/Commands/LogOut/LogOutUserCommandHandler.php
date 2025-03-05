<?php

declare(strict_types=1);

namespace Src\App\User\Application\Commands\LogOut;

use Exception;
use Src\App\User\Domain\Contracts\AuthServiceContract;
use Src\Shared\Infrastructure\Bus\CommandHandler;

class LogOutUserCommandHandler extends CommandHandler
{
    public function __construct(
        protected readonly AuthServiceContract $authService,
    ) {}

    /**
     * Handle the LogOutUserCommand
     *
     * @param LogOutUserCommand $command
     * @return bool
     * @throws Exception
     */
    public function handle(LogOutUserCommand $command): bool
    {
        return $this->authService->logoutUser();
    }
}
