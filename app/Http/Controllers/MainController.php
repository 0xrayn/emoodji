<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UnlockSession;
use App\Models\PrediksiFeature;
use App\Models\User;

class MainController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function assesment()
    {
        $user = Auth::user();

        // Data Kuis
        $kuis = Quiz::get();

        // Data Prediksi
        $feature = PrediksiFeature::first();
        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_type', PrediksiFeature::class)
            ->where('unlockable_id', $feature->id)
            ->first();

        return view('user.assessment.index', [
            'kuis' => $kuis,
            'feature' => $feature,
            'session' => $session,
        ]);
    }

    public function tes()
    {
        return view('user.tes');
    }

    public function bot()
    {
        return view('user.botman');
    }

    public function lagu()
    {
        return view('user.music');
    }

    public function permainan()
    {
        return view('permainan');
    }

    public function masukan()
    {
        return view('masukan');
    }

    public function chat()
    {
        return view('user.chat');
    }

    public function project()
    {
        return view('project');
    }

    public function team()
    {
        return view('team');
    }

    public function kuis()
    {
        $quiz = Quiz::get();

        return view('user.kuis.index', ['kuis' => $quiz]);
    }

    public function kerjakan(Quiz $quiz)
    {
        $user = Auth::user();

        // cek apakah user sudah unlock kuis ini
        $session = UnlockSession::where('user_id', $user->id)
            ->where('unlockable_id', $quiz->id)
            ->where('unlockable_type', Quiz::class)
            ->where('status', 'active')
            ->first();

        if (!$session) {
            return back()->with('error', 'Kuis belum di-unlock!');
        }

        // Ambil pertanyaan
        $questions = Question::where('quiz_id', $quiz->id)->get();

        if ($questions->isEmpty()) {
            return back()->with('error', 'Belum ada pertanyaan untuk kuis ini!');
        }

        // Format pertanyaan
        $dataQuiz = [];
        $no = 1;
        foreach ($questions as $q) {
            $options = json_decode($q->options, true);
            $dataQuiz[] = [
                "numb" => $no,
                "answer" => $options[$q->answer] ?? null,
                "question" => strip_tags($q->question),
                "options" => array_values($options)
            ];
            $no++;
        }

        return view('user.kuis.kerjakan', [
            'quiz' => $quiz,
            'questions' => $dataQuiz
        ]);
    }



    // public function api(Request $request, Quiz $quiz)
    // {
    //     $cek = QuizResult::where('quiz_id', $quiz->id)->where('user_id', Auth::id())->get();
    //     $questions  = Question::where('quiz_id', $quiz->id)->get();

    //     if (!count($cek)) {
    //         $quiz_result = new QuizResult;
    //         $quiz_result->quiz_id = $quiz->id;
    //         $quiz_result->user_id = Auth::id();
    //         $quiz_result->true = $request->true;
    //         $quiz_result->false = (count($questions) - $request->true);
    //         $quiz_result->score = round($request->true * (100 / count($questions)), 2);
    //         $quiz_result->by = $quiz->user_id;
    //         $quiz_result->save();
    //     } else {
    //         if ($quiz->by == "admin") {
    //             $quiz_result = QuizResult::where('quiz_id', $quiz->id)->where('user_id', Auth::id());
    //             $quiz_result->update([
    //                 'quiz_id' => $quiz->id,
    //                 'user_id' => Auth::id(),
    //                 'true' => $request->true,
    //                 'false' => (count($questions) - $request->true),
    //                 'score' => round($request->true * (100 / count($questions)), 2),
    //             ]);
    //         }
    //     }
    // }

    public function api(Request $request, Quiz $quiz)
    {
        $session = UnlockSession::where('user_id', Auth::id())
            ->where('unlockable_id', $quiz->id)
            ->where('unlockable_type', Quiz::class)
            ->first();

        if (!$session || $session->status != 'active') {
            return response()->json(['error' => 'Kuis belum dibuka atau sudah selesai.'], 403);
        }

        $questions = Question::where('quiz_id', $quiz->id)->get();
        $quiz_result = QuizResult::create([
            'quiz_id' => $quiz->id,
            'user_id' => Auth::id(),
            'true' => $request->true,
            'false' => (count($questions) - $request->true),
            'score' => round($request->true * (100 / count($questions)), 2),
            'by' => $quiz->user_id,
        ]);

        // Update session menjadi completed
        $session->update(['status' => 'completed']);
    }


    public function rec()
    {
        return redirect()->route('kuis')->with('success', 'Kuis Berhasil Dikerjakan');
    }
}
