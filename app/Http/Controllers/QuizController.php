<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.kuis.index', [
            'quiz_admin' => Quiz::where('user_id', Auth::id())->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.kuis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name' => "required|min:4"]);

        $quiz = new Quiz;
        $quiz->quiz_name = $request->name;
        $quiz->user_id = Auth::id();
        $quiz->save();

        return redirect()->route('admin.kuis.index')->with('success', "Kuis Berhasil Dibuat!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('admin.kuis.edit', [
            'quiz' => Quiz::where('id', $id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['name' => "required|min:4"]);

        $quiz = Quiz::where('id', $id)->get();
        $quiz = $quiz[0];
        $quiz->quiz_name = $request->name;
        $quiz->save();

        return redirect()->route('admin.kuis.index')->with('success', "Kuis Berhasil Diupdate!");
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($quiz_id)
    {
        (Quiz::where('id', $quiz_id)->delete());
        Question::where('quiz_id', $quiz_id)->delete();
        QuizResult::where('quiz_id', $quiz_id)->delete();

        return back()->with('success', "Kuis Berhasil Dihapus!");
    }

    public function assessment()
    {
        $quizzes = Quiz::all();
        return view('assessment.index', compact('quizzes'));
    }
}
