<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use Mockery\MockInterface;
use Illuminate\Support\Facades\Log;
use App\Contracts\Services\ChatServiceInterface;

class ChatControllerTest extends TestCase
{

    function test_ask_returns_openai_response(): void
    {
        if (config('app.env') !== 'integration') {
            $this->markTestSkipped('外部APIを呼び出すためintegrationテスト以外ではスキップします。');
        }

        $response = $this->postJson(route('api.chat.ask'), ['message' => '調子はどうだい？']);

        $response->assertOk();
        $response->assertJsonStructure(['answer']);
    }

    function test_ask_mocked_returns_openai_response(): void
    {
        $this->partialMock(ChatServiceInterface::class, function (MockInterface $mock) {
            $mock->shouldReceive('ask')->once()->andReturn('Hello');
        });

        $response = $this->postJson(route('api.chat.ask'), ['message' => 'おはよう!']);

        $response->assertOk();
        $response->assertExactJson(['answer' => 'Hello']);
    }
}
