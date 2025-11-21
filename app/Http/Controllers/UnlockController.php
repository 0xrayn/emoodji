<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Quiz;
use App\Models\PrediksiFeature;
use App\Models\Permainan;
use App\Models\UnlockSession;

class UnlockController extends Controller
{
    /**
     * Unlock a quiz, prediksi, or game
     */
    public function unlock(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'id'   => 'required|integer'
        ]);

        $user = Auth::user();
        $type = $request->type;
        $id   = $request->id;

        $modelClasses = [
            'quiz'     => \App\Models\Quiz::class,
            'prediksi' => \App\Models\PrediksiFeature::class,
            'game'     => \App\Models\Permainan::class,
        ];

        if (!isset($modelClasses[$type])) {
            return response()->json(['error' => 'Type tidak valid'], 400);
        }

        $model = $modelClasses[$type]::find($id);

        if (!$model) {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }

        $cost = $model->unlock_cost ?? 0;

        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_id', $id)
            ->where('unlockable_type', $modelClasses[$type])
            ->first();

        if ($session && $session->status === 'active') {
            return response()->json(['message' => 'Sudah unlock sebelumnya (masih aktif)'], 200);
        }

        if ($user->reward < $cost) {
            return response()->json(['error' => 'Reward tidak mencukupi'], 400);
        }

        User::where('id', $user->id)->decrement('reward', $cost);

        UnlockSession::updateOrCreate(
            [
                'user_id'         => $user->id,
                'unlockable_id'   => $id,
                'unlockable_type' => $modelClasses[$type],
            ],
            [
                'status'      => 'active',
                'unlock_cost' => $cost,
            ]
        );

        return response()->json(['message' => 'Berhasil unlock!'], 200);
    }



    /**
     * Tandai session completed setelah user selesai
     */
    public function complete($type, $id)
    {
        $user = Auth::user();

        if ($type === 'quiz') {
            $class = Quiz::class;
        } elseif ($type === 'prediksi') {
            $class = PrediksiFeature::class;
        } elseif ($type === 'game') {
            $class = Permainan::class;
        } else {
            return response()->json(['error' => 'Type tidak valid'], 400);
        }

        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_id', $id)
            ->where('unlockable_type', $class)
            ->first();

        if (!$session) {
            return response()->json(['error' => 'Session unlock tidak ditemukan'], 404);
        }

        $session->status = 'completed';
        $session->save();

        return response()->json(['message' => ucfirst($type) . ' session completed']);
    }

    /**
     * Cek status unlock
     */
    public function status($type, $id)
    {
        $user = Auth::user();

        if ($type === 'quiz') {
            $class = Quiz::class;
        } elseif ($type === 'prediksi') {
            $class = PrediksiFeature::class;
        } elseif ($type === 'game') {
            $class = Permainan::class;
        } else {
            return response()->json(['error' => 'Type tidak valid'], 400);
        }

        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_id', $id)
            ->where('unlockable_type', $class)
            ->first();

        if (!$session) {
            return response()->json(['status' => 'locked']);
        }

        return response()->json(['status' => $session->status]);
    }
}
