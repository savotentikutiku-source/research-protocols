<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Protocol; // ← これを忘れずに！

class ProtocolController extends Controller
{
    public function index()
    {
        // データベースから全てのプロトコールを取ってくる
        $protocols = Protocol::all();
        
        // 'protocols.index' という画面にデータを渡して表示する
        return view('protocols.index', compact('protocols'));
    }

    // ...上のindexメソッドはそのまま残す...

    // ① 新規登録の「画面」を表示する処理
    public function create()
    {
        return view('protocols.create');
    }

    // ② 画面から送られてきたデータを「保存」する処理
    public function store(Request $request)
    {
        // 1. 空っぽで送信されないようにチェック（バリデーション）
        $request->validate([
            'title' => 'required|max:255',
            'category' => 'required|max:255',
            'materials' => 'required',
            'steps' => 'required',
        ]);

        // 2. データベースに保存
        Protocol::create($request->all());

        // 3. 一覧画面に戻る
        return redirect()->route('protocols.index');
    }
} // ← クラスの最後の閉じカッコ
