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
        Schema::create('fanclub_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // ログインユーザーのID
            $table->foreignId('vtuber_id')->constrained(); // VtuberのID
            $table->string('fan_name');
            $table->text('likes');
            $table->text('support_comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fanclub_members');
    }
};
