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
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->enum('role', ['admin', 'siswa']);
            $table->decimal('w1', 2, 2)->default(0);
            $table->decimal('w2', 2, 2)->default(0);
            $table->decimal('w3', 2, 2)->default(0);
            $table->decimal('w4', 2, 2)->default(0);
            $table->decimal('w5', 2, 2)->default(0);
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
