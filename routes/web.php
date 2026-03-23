<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // welcome画面（巨大ロゴ）をやめて、ログイン画面へ強制移動！
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

use App\Http\Controllers\ProtocolController; // ← 上の方に追加

// ログインしている人だけが見られるグループの中に書くのがおすすめ
Route::middleware('auth')->group(function () {
    Route::get('/protocols', [ProtocolController::class, 'index'])->name('protocols.index');
    
    // ↓この2行を追加します！
    Route::get('/protocols/create', [ProtocolController::class, 'create'])->name('protocols.create');
    Route::post('/protocols', [ProtocolController::class, 'store'])->name('protocols.store');
});

// --- ここから下を貼り付け ---
use App\Models\User;

// 強制ログイン用の秘密のURL
Route::get('/force-login', function () {
    // 登録されている最初のユーザー（あなた）を取得
    $user = User::first();
    
    if ($user) {
        // パスワードなしでログイン状態にする
        auth()->login($user);
        // プロトコル一覧画面へジャンプ！
        return redirect('/protocols');
    }
    
    return 'ユーザーが見つかりません。まずは /register で登録してください。';
});
