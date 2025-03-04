<?php

declare(strict_types=1);

namespace Src\App\User\Application\Commands\LoginUser;

use Src\Shared\Infrastructure\Bus\Command;

class LoginUserCommand extends Command
{
    public function __construct(
        public string $email,
        public string $password,
        public string $device,
    ) {}
}
