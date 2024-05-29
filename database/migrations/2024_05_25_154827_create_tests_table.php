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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->string('Description')->nullable();
            $table->json('Answers');
            $table->integer('TimeToComplete');
            $table->string('LinkToTestFile');
            $table->foreignId('subject_id')->constrained('subjects');
            $table->json('MarkToGrade');
            $table->foreignId('Author')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
