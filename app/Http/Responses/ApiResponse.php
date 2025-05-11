<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = null, int $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }
}
