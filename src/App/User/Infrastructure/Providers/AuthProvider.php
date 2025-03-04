<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Providers;

use Src\App\User\Domain\Contracts\AuthProviderContract;

class AuthProvider implements AuthProviderContract
{
    /**
     * Authenticate user
     *
     * @param string $email
     * @param string $password
     * @return bool
     */
    public function loginUser(string $email, string $password): bool
    {
        return auth()->attempt(['email' => $email, 'password' => $password]);
    }

    /**
     * Get Token
     *
     * @param string $device
     * @return bool
     */
    public function getToken(string $device): bool
    {
        return auth()->user()->createToken($device)->plainTextToken;
    }

    /**
     * Get User
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function getUser(): ?\Illuminate\Contracts\Auth\Authenticatable
    {
        return auth()->user();
    }
}
