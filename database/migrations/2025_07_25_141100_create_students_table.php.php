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
        //
        Schema::create('students', function (Blueprint $table) {
        $table->id(); // Auto-incrementing ID
        $table->string('name');
        $table->string('email', 191)->unique();
        $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Optional gender enum
        $table->date('dateOfBirth')->nullable();
        $table->string('address')->nullable();
        $table->enum('status', ['active', 'inactive'])->default('active'); // Status with default
        $table->string('phoneNumber')->nullable();
        $table->string('password');
        $table->timestamps(); // created_at & updated_at
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
