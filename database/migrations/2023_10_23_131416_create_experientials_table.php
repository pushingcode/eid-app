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
        Schema::create('experientials', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('session');
            $table->string('tool');
            $table->string('lang');
            $table->timestamp('time_start');
            $table->json('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experientials');
    }
};
