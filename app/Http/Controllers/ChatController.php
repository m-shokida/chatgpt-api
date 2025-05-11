<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Responses\ApiResponse;
use App\Contracts\Services\ChatServiceInterface;

class ChatController extends Controller
{
    function __construct(protected ChatServiceInterface $chatService) {}

    function ask(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:12000',
        ]);

        $answer = $this->chatService->ask($validated['message']);

        return ApiResponse::success(['answer' => $answer]);
    }
}
