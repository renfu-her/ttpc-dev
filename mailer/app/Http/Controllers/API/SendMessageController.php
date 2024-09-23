<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMessageController extends Controller
{
    public function sendMessage(Request $request)
    {
        $message = $request->input('message');
        $email = $request->input('email');
        $subject = $request->input('subject');

        Mail::send('emails.contact', ['message' => $message], function ($message) use ($email, $subject) {
            $message->to($email)->subject($subject);
        });
    }
}
