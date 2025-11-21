<?php

namespace App\Http\Controllers;

use Chatify\Http\Controllers\MessagesController as ChatifyMessages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MyMessagesController extends ChatifyMessages
{
    public function send(Request $request)
    {
        try {
            $response = parent::send($request);

            if ($request->id != Auth::id()) {
                User::where('id', Auth::id())->increment('reward', 1);
            }

            return $response;
        } catch (\Throwable $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
