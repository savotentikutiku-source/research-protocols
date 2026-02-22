<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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
    // ... 他の設定があればそのままでOK
});
