<?php

declare(strict_types=1);

namespace Src\App\User\Domain\Contracts;

interface AuthProviderContract
{
    public function getToken(string $email, string $password);

    public function getUser();
}
