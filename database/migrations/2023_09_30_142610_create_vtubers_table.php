<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVtubersTable extends Migration
{
    public function up()
    {
        Schema::create('vtubers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('self_introduction');
            $table->string('image');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vtubers');
    }
}
