<?php

declare(strict_types=1);

namespace Src\App\User\Application\Commands\LoginUser;

use Exception;
use Src\App\User\Domain\Contracts\AuthServiceContract;
use Src\App\User\Domain\Exception\InvalidCredentialsException;
use Src\Shared\Infrastructure\Bus\CommandHandler;

class LoginUserCommandHandler extends CommandHandler
{
    public function __construct(
        protected readonly AuthServiceContract $authService,
    ) {}

    /**
     * Handle the LoginUserCommand
     *
     * @param LoginUserCommand $query
     * @return array|null
     * @throws Exception
     */
    public function handle(LoginUserCommand $query): ?array
    {
        $isAuthenticated = $this->authService->loginUser($query->email, $query->password);

        if (!$isAuthenticated) {
            throw new InvalidCredentialsException();
        }

        return [
            'user' => $this->authService->getUser(),
            'token' => $this->authService->getToken($query->device),
        ];
    }
}
