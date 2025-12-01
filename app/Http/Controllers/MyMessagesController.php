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

        $now = time();
        $lastReward = session('last_reward_time', 0);

        // Cooldown of 10 seconds (you can change the number)
        $cooldown = 10;

        $rewardData = null;

        if ($now - $lastReward >= $cooldown) {
            // Give reward only if cooldown passed
            \App\Models\User::where('id', Auth::id())->increment('reward', 1);

            session(['last_reward_time' => $now]);

            $rewardData = [
                "text" => "+1 reward 🎉 (Cooldown applied)"
            ];
        }

        return response()->json([
            "error" => 0,
            "message" => $response->getData()->message,
            "tempID" => $response->getData()->tempID,
            "reward" => $rewardData
        ]);

    } catch (\Throwable $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage()
        ], 500);
    }
}

}
