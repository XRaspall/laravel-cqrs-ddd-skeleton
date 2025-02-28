<?php

declare(strict_types=1);

namespace Src\App\User\Presentation\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
     */
    public function login(UserLoginRequest $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'token' => $request->user()->createToken($request->device)->plainTextToken,
            'message' => 'Success'
        ]);
    }
}
