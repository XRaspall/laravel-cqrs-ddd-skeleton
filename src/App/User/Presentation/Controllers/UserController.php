<?php

declare(strict_types=1);

namespace Src\App\User\Presentation\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Src\App\User\Application\Commands\LoginUser\LoginUserCommand;
use Src\App\User\Application\Commands\LogOut\LogOutUserCommand;
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

    /**
     * Validate user
     *
     * @param UserLoginRequest $request
     * @return JsonResponse
     */
    public function login(UserLoginRequest $request): JsonResponse
    {
        try {
            $user = $this->commandBus->dispatch(
                new LoginUserCommand($request->email, $request->password, $request->device),
            );

            return $this->response($user);
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 500);
        }
    }

    /**
     * Destroy token
     *
     * @return JsonResponse
     */
    public function destroy(): JsonResponse
    {
        try {
            $this->commandBus->dispatch(
                new LogOutUserCommand(),
            );

            return $this->response('User logged out');
        } catch (Exception $e) {
            return $this->response($e->getMessage(), 500);
        }
    }
}
