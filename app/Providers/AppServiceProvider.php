<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Chat\OpenAiChatService;
use App\Contracts\Services\ChatServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            ChatServiceInterface::class,
            OpenAiChatService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
