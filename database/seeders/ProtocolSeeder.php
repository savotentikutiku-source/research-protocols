<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProtocolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Protocol::create([
        'title' => 'プラスミド抽出（ミニプレップ）',
        'category' => '核酸抽出',
        'materials' => "・溶液I (Suspension)\n・溶液II (Lysis)\n・溶液III (Neutralization)",
        'steps' => "1. 培養液を遠心分離する\n2. 上清を捨て、溶液Iで懸濁する\n3. 溶液IIを加え、転倒混和する",
        'notes' => '溶液IIを加えた後は激しく振らないこと。',
    ]);
}
}
