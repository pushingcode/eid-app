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
        Schema::create('ipvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('type_id');
            $table->string('question');
            $table->double('value', 3, 3);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ipvs');
    }
};
