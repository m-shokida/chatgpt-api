<?php

namespace App\Contracts\Services;

interface ChatServiceInterface
{
    public function ask(string $message): string;
}
