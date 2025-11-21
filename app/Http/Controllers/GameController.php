<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class GameController extends Controller
{

    public function TebakAngka()
    {
        return view('permainan.TebakAngka');
    }

    public function mahjong()
    {
        return view('permainan.mahjong');
    }

    public function Ingat()
    {
        return view('permainan.Memory');
    }

    public function Puzzle()
    {
        return view('permainan.Puzzle');
    }

    public function BKG()
    {
        return view('permainan.RPS');
    }


    public function reward(Request $request, $points)
    {
        User::where('id', Auth::id())->increment('reward', $points);

        $newReward = User::where('id', Auth::id())->value('reward');

        return response()->json(['success' => true, 'new_reward' => $newReward]);
    }
}
