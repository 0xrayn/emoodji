<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\QuizResult;
class UserController extends Controller
{
    public function index()
    {
        //
        $users = User::where('role', '<>', 'admin')->get();
        return view('admin.user.index', ['users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        if ($user->role != "admin") {

            if ($user->role == "guru") {
                $allQuiz = Quiz::where('user_id', $user->id)->get();

                foreach ($allQuiz as $val) {
                    Question::where('quiz_id', $val->id)->delete();
                    QuizResult::where('quiz_id', $val->id)->delete();
                }

                Quiz::where('user_id', $user->id)->delete();
                QuizResult::where('by', $user->id)->delete();
            }

            QuizResult::where('user_id', $user->id)->delete();

            $user->delete();
            return back()->with('success', "Pengguna Berhasil Dihapus!");
        }

        return back()->with('error', "Pengguna Admin Tidak Bisa Dihapus!");
    }
}
