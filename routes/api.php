<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::name('api.')->group(function () {
    Route::prefix('chat')->name('chat.')->controller(ChatController::class)->group(function () {
        Route::post('/ask', 'ask')->name('ask');
    });
});
