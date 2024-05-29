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
        Schema::create('passed_tests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_id')->constrained('tests');
            $table->foreignId('user_id')->constrained('users');
            $table->integer('PassTime');
            $table->integer('Grade');
            $table->integer('TimeSpent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passed_tests');
    }
};
