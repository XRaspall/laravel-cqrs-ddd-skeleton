<?php

declare(strict_types=1);

namespace Src\App\User\Presentation\Requests;

use Src\Shared\Presentation\Requests\BaseRequest;

class UserLoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:6', 'max:20'],
        ];
    }
}
