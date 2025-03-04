<?php

declare(strict_types=1);

namespace Src\App\User\Domain\Contracts;

use Src\App\User\Domain\Entities\User;

interface AuthProviderContract
{
    /**
     * Authenticate user
     *
     * @param string $email
     * @param string $password
     */
    public function loginUser(string $email, string $password);

    /**
     * Get Token
     *
     * @param string $device
     * @return bool
     */
    public function getToken(string $device);

    /**
     * Get User
     *
     * @return mixed
     */
    public function getUser();
}
