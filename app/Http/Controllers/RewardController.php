<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RewardController extends Controller
{
    public function addReward(Request $request)
    {
        $user = Auth::user();
        $rewardAmount = 10;
        User::where('id', Auth::id())->increment('reward', $rewardAmount);
        $user = Auth::user()->fresh(); // ambil data terbaru dari DB

        return response()->json([
            'status' => 'success',
            'reward' => $user->reward
        ]);
    }
}
