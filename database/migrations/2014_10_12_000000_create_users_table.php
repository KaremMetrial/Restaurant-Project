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
            $table->string('name', 100);
            $table->string('avatar', 255)->default('/uploads/avatar.jpg');
            $table->string('email', 100)->unique();
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 60);
            $table->rememberToken();
            $table->timestamps();

            $table->index(['name', 'email', 'role']);
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
