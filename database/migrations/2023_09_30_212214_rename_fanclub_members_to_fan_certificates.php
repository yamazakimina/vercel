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
        Schema::rename('fanclub_members','fan_certificates');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('fan_certificates','fanclub_members');
    }
};
