<?php

declare(strict_types=1);

namespace Src\App\User\Domain\Contracts;

use Illuminate\Contracts\Auth\Authenticatable;

interface AuthServiceContract
{
    public function loginUser(string $email, string $password): bool;

    public function getToken(string $device): string;

    public function getUser(): ?Authenticatable;

    public function logoutUser(): bool;
}
