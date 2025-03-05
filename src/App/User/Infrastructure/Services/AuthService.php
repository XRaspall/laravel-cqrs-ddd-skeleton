<?php

declare(strict_types=1);

namespace Src\App\User\Infrastructure\Services;

use Illuminate\Contracts\Auth\Authenticatable;
use Src\App\User\Domain\Contracts\AuthServiceContract;

class AuthService implements AuthServiceContract
{
    /**
     * Authenticate the user.
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
     * Get Token for the currently authenticated user.
     *
     * @param string $device
     * @return string
     */
    public function getToken(string $device): string
    {
        return auth()->user()->createToken($device)->plainTextToken;
    }

    /**
     * Get the currently authenticated user.
     *
     * @return Authenticatable|null
     */
    public function getUser(): ?Authenticatable
    {
        return auth()->user();
    }

    /**
     * Logout the currently authenticated user.
     *
     * @return bool
     */
    public function logoutUser(): bool
    {
        return auth()->user()->currentAccessToken()->delete();
    }
}
