<?php

declare(strict_types=1);

namespace Src\App\User\Presentation\Controllers;

use Src\App\User\Presentation\Requests\UserLoginRequest;
use Src\Shared\Domain\Contracts\CommandBusContract;
use Src\Shared\Domain\Contracts\QueryBusContract;
use Src\Shared\Presentation\Controllers\Controller;

class UserController extends Controller
{
    public function __construct(
        protected CommandBusContract $commandBus,
        protected QueryBusContract $queryBus
    ) {}

    public function login(UserLoginRequest $request): void
    {
        logger('User login request', $request->all());
    }
}
