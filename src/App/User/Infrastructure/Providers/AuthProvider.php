<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Providers;

use Src\App\User\Domain\Contracts\AuthProviderContract;

class AuthProvider implements AuthProviderContract
{
    public function getToken(string $email, string $password)
    {
        return auth()->attempt(['email' => $email, 'password' => $password]);
    }

    public function getUser()
    {
        return auth()->user();
    }
}
