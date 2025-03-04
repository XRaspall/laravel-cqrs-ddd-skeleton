<?php

declare(strict_types=1);

namespace Src\App\User\Presentation\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Src\App\User\Application\Commands\LoginUser\LoginUserCommand;
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
        } catch (\Exception $e) {
            return $this->response($e->getMessage(), 500);
        }
    }

    /**
     * Destroy token
     *
     * @param Request $request
     * @return ResponseFactory|Application|Response|object
     */
    public function destroy(Request $request){
        Auth::user()->currentAccessToken()->delete();
        return response(null, 204);
    }
}
