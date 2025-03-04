<?php

declare(strict_types=1);

namespace Src\App\User\Application\Commands\LoginUser;

use Src\App\User\Domain\Contracts\AuthProviderContract;
use Src\Shared\Infrastructure\Bus\CommandHandler;

class LoginUserCommandHandler extends CommandHandler
{
    public function __construct(
        protected readonly AuthProviderContract $authProvider,
    ) {}

    public function handle(LoginUserCommand $query): ?array
    {
        $isAuthenticated = $this->authProvider->loginUser($query->email, $query->password);

        if (!$isAuthenticated) {
            throw new \Exception('Invalid credentials');
        }

        return [
            'user' => $this->authProvider->getUser(),
            'token' => $this->authProvider->getToken($query->device),
        ];
    }
}
