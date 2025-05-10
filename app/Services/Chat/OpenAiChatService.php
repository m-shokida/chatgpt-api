<?php

namespace App\Services\Chat;

use App\Contracts\Services\ChatServiceInterface;
use OpenAI\Laravel\Facades\OpenAI;

class OpenAiChatService implements ChatServiceInterface
{
    public function __construct(
        protected string $systemPrompt = 'あなたは親切で丁寧なAIアシスタントです。'
    ) {}

    public function ask(string $message): string
    {
        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => $this->systemPrompt],
                ['role' => 'user', 'content' => $message],
            ],
        ]);

        return $result->choices[0]->message->content;
    }
}