<?php

namespace App\Http\Controllers;

use App\Models\Prediksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class PrediksiController extends Controller
{
    public function index()
    {
        return view('user.pred.index');
    }

    public function testing()
    {
        return view('user.testing');
    }

//     public function cekDepresi(Request $request)
//     {
//         $data = $request->only(['femaleres', 'age', 'married', 'children', 'hhsize', 'edu', "day_of_week", "saved_mpesa", "received_mpesa", "given_mpesa", "ent_wagelabor", "ent_ownfarm", "ent_business", "ent_nonagbusiness"]);

//         $response = Http::post('http://127.0.0.1:5000/predict', [
//             'data' => array_values($data)
//         ]);

//         if ($response->successful()) {
//             return view('user.pred.hasil', ['predicted_proba' => $response->json()]);
//         } else {
//             return response()->json(['error' => 'Failed to get prediction data.'], 500);
//         }
//     }

    public function cekDepresi(Request $request)
    {
        $data = $request->only([
            'femaleres', 'age', 'married', 'children', 'hhsize', 'edu',
            'day_of_week', 'saved_mpesa', 'received_mpesa', 'given_mpesa',
            'ent_wagelabor', 'ent_ownfarm', 'ent_business', 'ent_nonagbusiness'
        ]);

        $response = Http::post('http://127.0.0.1:5000/predict', [
            'data' => array_values($data)
        ]);

        if ($response->successful()) {
            $predictedProba = $response->json();
            $probability = $predictedProba['predicted_proba_class_1'];

            $noTeks = 0;
            if ($probability >= 0 && $probability < 0.1999) {
                $noTeks = 1;
            } elseif ($probability >= 0.1999 && $probability < 0.3999) {
                $noTeks = 2;
            } elseif ($probability >= 0.3999 && $probability < 0.5999) {
                $noTeks = 3;
            } elseif ($probability >= 0.5999 && $probability < 0.7999) {
                $noTeks = 4;
            } elseif ($probability >= 0.7999 && $probability <= 1) {
                $noTeks = 5;
            }

            $teks = DB::table('teks')->where('no_teks', $noTeks)->first();

            $user_id = auth()->id();
            Prediksi::create([
                'predicted_proba_class_0' => $predictedProba['predicted_proba_class_0'],
                'predicted_proba_class_1' => $predictedProba['predicted_proba_class_1'],
                'no_teks' => $noTeks,
                'user_id' => $user_id,
            ]);

            return view('user.pred.hasil', [
                'predicted_proba_class_0' => $predictedProba['predicted_proba_class_0'],
                'predicted_proba_class_1' => $predictedProba['predicted_proba_class_1'],
                'teks' => $teks
            ]);
        } else {
            return response()->json(['error' => 'Failed to get prediction data.'], 500);
        }
    }



}
