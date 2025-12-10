<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PrediksiFeature;
use App\Models\PrediksiLog;
use App\Models\UnlockSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PrediksiController extends Controller
{
    // Halaman utama prediksi
    public function index()
    {
        $feature = PrediksiFeature::first();
        $user = Auth::user();

        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_type', PrediksiFeature::class)
            ->where('unlockable_id', $feature->id)
            ->first();

        return view('user.pred.index', [
            'feature' => $feature,
            'session' => $session
        ]);
    }

    // Unlock prediksi
    public function unlock(Request $request)
    {
        $feature = PrediksiFeature::findOrFail($request->feature_id);
        $user = Auth::user();

        if ($user->reward < $feature->unlock_cost) {
            return back()->with('error', 'Reward tidak cukup untuk unlock.');
        }

        $user = Auth::user();
        User::where('id', $user->id)->decrement('reward', $feature->unlock_cost);

        // $user->decrement('reward', $feature->unlock_cost);

        UnlockSession::updateOrCreate(
            [
                'user_id' => $user->id,
                'unlockable_id' => $feature->id,
                'unlockable_type' => PrediksiFeature::class
            ],
            [
                'status' => 'active',
                'unlock_cost' => $feature->unlock_cost
            ]
        );

        return back()->with('success', 'Berhasil unlock prediksi!');
    }

    // Submit prediksi
    public function submit(Request $request)
    {
        $feature = PrediksiFeature::first();
        $user = Auth::user();

        // ambil data input user
        $data = $request->only([
            'femaleres',
            'age',
            'married',
            'children',
            'hhsize',
            'edu',
            'day_of_week',
            'saved_mpesa',
            'received_mpesa',
            'given_mpesa',
            'ent_wagelabor',
            'ent_ownfarm',
            'ent_business',
            'ent_nonagbusiness'
        ]);

        // Kirim ke ML API
        $response = Http::withoutVerifying()->post(
            'https://depresi-api-395027170614.asia-southeast2.run.app/predict',
            [
                'data' => array_values($data)
            ]
        );


        if (!$response->successful()) {
            return back()->withErrors(['error' => 'Prediksi gagal. Silakan coba lagi.']);
        }

        $predictedProba = $response->json();
        $probability = $predictedProba['class_1_proba'];

        // tentukan teks hasil
        $noTeks = match (true) {
            $probability < 0.1999 => 1,
            $probability < 0.3999 => 2,
            $probability < 0.5999 => 3,
            $probability < 0.7999 => 4,
            default => 5,
        };

        $teks = DB::table('teks')->where('no_teks', $noTeks)->first();

        // simpan log
        PrediksiLog::create([
            'user_id' => $user->id,
            'prediksi_feature_id' => $feature->id,
            'class_0_proba' => $predictedProba['class_0_proba'],
            'class_1_proba' => $predictedProba['class_1_proba'],
            'no_teks' => $noTeks
        ]);

        // tandai session completed
        UnlockSession::where('user_id', $user->id)
            ->where('unlockable_id', $feature->id)
            ->where('unlockable_type', PrediksiFeature::class)
            ->update(['status' => 'completed']);

        return view('user.pred.hasil', [
            'class_0_proba' => $predictedProba['class_0_proba'],
            'class_1_proba' => $predictedProba['class_1_proba'],
            'teks' => $teks
        ]);
    }
}
