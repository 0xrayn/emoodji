<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\UnlockController;
use App\Http\Controllers\DiskusiController;
use App\Http\Controllers\PrediksiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\Auth\SocialiteController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/home', [AdminController::class, 'index'])->name('home');
Route::post('/home', [PertanyaanController::class, 'subscribe'])->name('subscribe');

Route::get('/auth/redirect', [SocialiteController::class, 'redirect']);
Route::get('/auth/google/callback', [SocialiteController::class, 'callback']);

Route::get('/tes', [MainController::class, 'tes'])->name('tes');

Route::middleware('auth')->group(function () {
    // Route::get('/chat', [MainController::class, 'chat'])->name('chat');
    // Route::post('/chat', 'App\Http\Controllers\ChatController');

    // Route::get('/lagu', [MainController::class, 'lagu'])->name('lagu');

    // Route::get('/tes', function () {
    //     return view('user.kuis');
    // });

    Route::post('/unlock', [UnlockController::class, 'unlock'])->name('unlock');
    Route::post('/unlock/complete/{type}/{id}', [UnlockController::class, 'complete'])->name('unlock.complete');
    Route::get('/unlock/status/{type}/{id}', [UnlockController::class, 'status'])->name('unlock.status');

    Route::get('/bot', [MainController::class, 'bot'])->name('bot');
    Route::match(['get', 'post'], '/botman', 'App\Http\Controllers\BotManController@handle');

    Route::get('/game', [MainController::class, 'permainan'])->name('permainan');
    // Route::get('/prediksi', [MainController::class, 'prediksi'])->name('prediksi');
    Route::get('/assessment', [MainController::class, 'assesment'])->name('assessment');

    Route::get('/prediksi', [PrediksiController::class, 'index'])->name('prediksi.index');
    Route::post('/prediksi/unlock', [PrediksiController::class, 'unlock'])->name('prediksi.unlock');
    Route::post('/prediksi/submit', [PrediksiController::class, 'submit'])->name('prediksi.submit');

    Route::get('/kuis', [MainController::class, 'kuis'])->name('kuis');
    Route::get('/kuis/rec', [MainController::class, 'rec'])->name('kuis.rec');
    Route::get('/kuis/{quiz}/result', [MainController::class, 'api'])->name('kuis.api');
    Route::get('/kuis/{quiz}', [MainController::class, 'kerjakan'])->name('kuis.kerjakan');
    Route::get('/result', [ResultController::class, 'index'])->name('kuis.result');

    // Route::prefix('/kuis')->name('kuis.')->group(function () {
    //     Route::get('/result', [ResultController::class, 'index'])->name('result');
    // });

    Route::get('/game/Mahjong', [GameController::class, 'mahjong'])->name('mahjong');
    Route::get('/game/TebakAngka', [GameController::class, 'TebakAngka'])->name('TebakAngka');
    Route::get('/game/MemoryGame', [GameController::class, 'Ingat'])->name('Ingat');
    Route::get('/game/TekaTekiBlok', [GameController::class, 'Puzzle'])->name('Puzzle');
    Route::post('/reward/{points}', [GameController::class, 'reward'])->name('reward');
    // Route::post('/cek-depresi', [PrediksiController::class, 'cekDepresi'])->name('cekDepresi');
});

Route::prefix('dashboard')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/form', [DashboardController::class, 'form'])->name('form');
    Route::get('/chart', [DashboardController::class, 'chart'])->name('chart');
    Route::get('/table', [DashboardController::class, 'table'])->name('table');

    Route::resource('/users', UserController::class);

    Route::name('informasi.')->group(function () {
        Route::get('/informasi', [InformasiController::class, 'index'])->name('index');
        Route::get('informasi/show', [InformasiController::class, 'index'])->name('show');
        Route::get('informasi/create', [InformasiController::class, 'create'])->name('create');
        Route::post('informasi/store', [InformasiController::class, 'store'])->name('store');
        Route::get('informasi/{judul}/edit', [InformasiController::class, 'edit'])->name('edit');
        Route::put('informasi/{judul}/update', [InformasiController::class, 'update'])->name('update');
        Route::delete('informasi/{judul}/destroy', [InformasiController::class, 'destroy'])->name('destroy');
    });

    // Route::resource('/kuis', AdminKuisController::class);

    Route::get('/quiz-result', [ResultController::class, 'index'])->name('result');
    Route::get('/quiz-result/{quiz}', [ResultController::class, 'result'])->name('result.list');

    Route::name('kuis.')->group(function () {
        Route::get('/kuis', [QuizController::class, 'index'])->name('index');
        Route::get('kuis/show', [QuizController::class, 'index'])->name('show');
        Route::get('kuis/create', [QuizController::class, 'create'])->name('create');
        Route::post('kuis/store', [QuizController::class, 'store'])->name('store');
        Route::get('kuis/{judul}/edit', [QuizController::class, 'edit'])->name('edit');
        Route::put('kuis/{judul}/update', [QuizController::class, 'update'])->name('update');
        Route::delete('kuis/{judul}/destroy', [QuizController::class, 'destroy'])->name('destroy');
    });

    Route::prefix('/question')->name('q.')->group(function () {
        Route::get('/{quiz}', [QuestionController::class, 'index'])->name('index');
        Route::get('/{quiz}/create', [QuestionController::class, 'create'])->name('create');
        Route::post('/{quiz}/store', [QuestionController::class, 'store'])->name('store');
        Route::get('/{quiz}/{question}/edit', [QuestionController::class, 'edit'])->name('edit');
        Route::post('/{quiz}/{question}/edit', [QuestionController::class, 'update'])->name('update');
        Route::get('/{quiz}/{question}/destroy', [QuestionController::class, 'destroy'])->name('destroy');
    });

    Route::name('pertanyaan.')->group(function () {
        Route::get('/pertanyaan', [PertanyaanController::class, 'index'])->name('index');
    });
});

Route::get('/informasi', [InformasiController::class, 'informasi'])->name('informasi');
Route::get('/informasi/{judul}', [InformasiController::class, 'baca'])->name('baca');
Route::get('/info1', [InformasiController::class, 'info1'])->name('info1');
Route::get('/info2', [InformasiController::class, 'info2'])->name('info2');
Route::get('/info3', [InformasiController::class, 'info3'])->name('info3');

Route::get('/team', [MainController::class, 'team'])->name('team');
Route::get('/detail', [MainController::class, 'detail'])->name('detail');
Route::get('/masukan', [PertanyaanController::class, 'masukan'])->name('masukan');
Route::post('/masukan', [PertanyaanController::class, 'kirim'])->name('pertanyaan');
Route::get('/project', [MainController::class, 'project'])->name('project');

Route::fallback(function () {
    return view('404');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
