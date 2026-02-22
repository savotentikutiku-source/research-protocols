<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('protocols', function (Blueprint $table) {
        $table->id();
        $table->string('title');        // Wordの「タイトル」を入れる箱
        $table->string('category');     // 「DNA抽出」などの分類
        $table->text('materials');      // 「材料」を入れる大きな箱
        $table->text('steps');          // 「手順」を入れる大きな箱
        $table->text('notes')->nullable(); // 「コツ・注意点」
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('protocols');
    }
};
