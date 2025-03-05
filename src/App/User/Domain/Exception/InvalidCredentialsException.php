<?php

declare(strict_types=1);

namespace Src\App\User\Domain\Exception;

use Exception;

class InvalidCredentialsException extends Exception {
    private const MESSAGE = 'Invalid credentials';

    public function __construct() {
        parent::__construct(self::MESSAGE);
    }
}
