<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    // 画面から入力・保存して良い項目をここで許可します
    protected $fillable = [
        'title',
        'category',
        'materials',
        'steps',
        'notes',
    ];
}