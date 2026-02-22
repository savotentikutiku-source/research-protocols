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
}