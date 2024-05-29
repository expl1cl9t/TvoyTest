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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('Email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('Password');
            $table->string('Surname')->nullable();
            $table->string('Patronymic')->nullable();
            $table->foreignId('group_id')->nullable()->constrained('groups');
            $table->date('Birthday')->nullable();
            $table->foreignId('status_id')->default(1)->constrained('statuses');
            $table->foreignId('role_id')->constrained('roles');
            $table->foreignId('school_id')->constrained('schools');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
