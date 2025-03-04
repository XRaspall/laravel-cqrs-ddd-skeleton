<?php

declare(strict_types=1);

namespace Src\Shared\Presentation\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    /**
     * Return a JSON response.
     *
     * @param array|string $data
     * @param int $status
     * @return JsonResponse
     */
    public function response(array|string $data, int $status = 200): JsonResponse
    {
        return response()->json($data, $status);
    }
}
