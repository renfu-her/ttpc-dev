<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\SendMessageController;
Route::post('/send-message', [SendMessageController::class, 'sendMessage'])->name('send-message');