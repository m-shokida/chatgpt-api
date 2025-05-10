<?php

namespace Tests\Feature\Services\Chat;

use Tests\TestCase;
use OpenAI\Laravel\Facades\OpenAI;
use Illuminate\Support\Facades\Log;
use App\Services\Chat\OpenAiChatService;
use OpenAI\Responses\Chat\CreateResponse;

class OpenAiChatServiceTest extends TestCase
{
    public function test_ask_returns_expected_response()
    {
        $fakeResponse = CreateResponse::fake([
            'choices' => [
                [
                    'message' => [
                        'role' => 'assistant',
                        'content' => 'おはようございます！今日はどんなことをお手伝いできますか？',
                    ],
                ],
            ],
        ]);

        OpenAI::fake(['chat.create' => $fakeResponse]);

        $service = new OpenAiChatService();
        $result = $service->ask('おはよう');

        $this->assertEquals('おはようございます！今日はどんなことをお手伝いできますか？', $result);
    }
}
